<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Http\Requests\SupplyRequest;
use App\Models\Client;
use App\Models\Inventory;
use Illuminate\Http\Request;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Supply;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use DataTables;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return datatable of the makes available
        $data = Supply::orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return date_format($row->created_at, 'Y/m/d H:i');
                })
                ->editColumn('supply_date', function ($row) {
                    return date_format($row->supply_date, 'Y/m/d H:i');
                })
                ->editColumn('product_id', function ($row) {
                    return $row->product->title;
                })
                ->editColumn('client_id', function ($row) {
                    return $row->supplier->name;
                })
                ->addColumn('action', function ($row) {
                    $btn_edit = $btn_del = null;
                    if (auth()->user()->hasAnyRole('superadmin|admin|editor') || auth()->id() == $row->created_by) {
                        $btn_edit = '<a data-toggle="tooltip" 
                                        href="' . route('supplies.edit', $row->id) . '" 
                                        class="btn btn-link btn-primary btn-lg" 
                                        data-original-title="Edit Record">
                                    <i class="fa fa-edit"></i>
                                </a>';
                    }

                    if (auth()->user()->hasRole('superadmin')) {
                        $btn_del = '<button type="button" 
                                    data-toggle="tooltip" 
                                    title="" 
                                    class="btn btn-link btn-danger" 
                                    onclick="delRecord(`' . $row->id . '`, `' . route('supplies.destroy', $row->id) . '`, `#tb_supplies`)"
                                    data-original-title="Remove">
                                <i class="fa fa-times"></i>
                            </button>';
                    }
                    return $btn_edit . $btn_del;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // render view
        return view('cms.supplies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('title', 'asc')->get();
        $suppliers = Supplier::orderBy('name', 'asc')->get();
        return view('cms.supplies.create', compact('products', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplyRequest $request)
    {
        // dd($request->validated());
        $supply = Supply::create($request->validated());

        if ($supply) {
            // update the product quantity
            $product = Product::find($request->product_id);
            $product->quantity = $product->quantity + $request->quantity;
            $product->cost =  $request->amount;
            $product->save();

            // Find and Update inventory
            $inventory = Inventory::where('product_id', $request->product_id)->first();
            if ($inventory) {
                $inventory->quantity_available =  $product->quantity;
                $inventory->save();
            } else {
                Inventory::create([
                    'product_id' => $request->product_id,
                    'quantity_available' => $product->quantity
                ]);
            }

            $wallet = Wallet::first();

            // Create a transaction: type 'expense' deducts funds (negative amount)
            WalletTransaction::create([
                'wallet_id'   => $wallet->id,
                'transaction_type'        => 'expense',
                'amount'      => - ($supply->cost), // deduct cost from wallet
                'description' => 'Supply purchase ID: ' . $supply->id,
            ]);
        }
        return redirect()->back()->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supply $supply)
    {
        return response()
            ->json($supply, 200, ['JSON_PRETTY_PRINT' => JSON_PRETTY_PRINT]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supply $supply)
    {
        $products = Product::orderBy('title', 'asc')->get();
        $suppliers = Supplier::orderBy('name', 'asc')->get();
        return view('cms.supplies.create', compact('supply', 'products', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplyRequest $request, Supply $supply)
    {
        $supply_old = Supply::find($supply->id);


        if ($supply->update($request->validated())) {
            // update the product quantity
            $product = Product::find($request->product_id);
            $product->quantity = ($product->quantity - $supply_old->quantity) + $request->quantity;
            $product->cost =  $request->amount;
            $product->save();

            // Find and Update inventory
            $inventory = Inventory::where('product_id', $request->product_id)->first();
            if ($inventory) {
                $inventory->quantity_available =  $product->quantity;
                $inventory->save();
            } else {
                Inventory::create([
                    'product_id' => $request->product_id,
                    'quantity_available' => $product->quantity
                ]);
            }

            $difference = $supply->total_amount - $supply_old->total_amount;
            if($difference != 0) {
                // update wallet and create transaction
                $wallet = Wallet::first();
                // Create a transaction: type 'supply' adds funds (positive amount)
                WalletTransaction::create([
                    'wallet_id'   => $wallet->id,
                    'transaction_type'  => 'supply_adjustment',
                    'amount'      => $difference, // positive amount
                    'description' => 'supply ID: ' . $supply->id,
                ]);
                 // Update the wallet balance accordingly
                $wallet->balance -= $difference;
                $wallet->save();
            }
        }

        // Redirect the user to the user's profile page
        return redirect()
            ->route('supplies.index')
            ->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supply $supply)
    {
        // Deduct the product quantity
        $product = Product::find($supply->product_id);
        $product->quantity = $product->quantity - $supply->quantity;
        $product->save();

        // Find and Update inventory
        $inventory = Inventory::where('product_id', $supply->product_id)->first();
        if ($inventory) {
            $inventory->quantity_available =  $product->quantity;
            $inventory->save();
        }

        if ($supply->delete()) {
            return response()->json([
                'code' => 1,
                'msg' => 'Record deleted successfully'
            ], 200, ['JSON_PRETTY_PRINT' => JSON_PRETTY_PRINT]);
        }

        return response()->json([
            'code' => -1,
            'msg' => 'Record did not delete'
        ], 422, ['JSON_PRETTY_PRINT' => JSON_PRETTY_PRINT]);
    }
}
