<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleRequest;
use App\Models\Client;
use App\Models\Inventory;
use Illuminate\Http\Request;

use App\Models\Sale;
use App\Models\Product;
use DataTables;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return datatable of the makes available
        $data = Sale::orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return date_format($row->created_at, 'Y/m/d H:i');
                })
                ->editColumn('sales_date', function ($row) {
                    return date_format($row->sales_date, 'Y/m/d H:i');
                })
                ->editColumn('product_id', function ($row) {
                    return $row->product->title;
                })
                ->editColumn('client_id', function ($row) {
                    return $row->client->name;
                })
                ->addColumn('action', function ($row) {
                    $btn_edit = $btn_del = null;
                    if (auth()->user()->hasAnyRole('superadmin|admin|editor') || auth()->id() == $row->created_by) {
                        $btn_edit = '<a data-toggle="tooltip" 
                                        href="' . route('sales.edit', $row->id) . '" 
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
                                    onclick="delRecord(`' . $row->id . '`, `' . route('sales.destroy', $row->id) . '`, `#tb_sales`)"
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
        return view('cms.sales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('title', 'asc')->get();
        $clients = Client::orderBy('name', 'asc')->get();
        return view('cms.sales.create', compact('products', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request)
    {
        // dd($request->validated());
        $record = Sale::create($request->validated());

        if($record){
            // update the product quantity
            $product = Product::find($request->product_id);
            $product->quantity = $product->quantity - $request->quantity;
            $product->save();

            // Find and Update inventory
            $inventory = Inventory::where('product_id', $request->product_id)->first();
            if($inventory){
                $inventory->quantity_available =  $product->quantity;
                $inventory->save();
            }else{
                Inventory::create([
                    'product_id' => $request->product_id,
                    'quantity_available' => $product->quantity
                ]);
            }
        }
        return redirect()->back()->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return response()
            ->json($sale, 200, ['JSON_PRETTY_PRINT' => JSON_PRETTY_PRINT]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {     
        $products = Product::orderBy('title', 'asc')->get();
        $clients = Client::orderBy('name', 'asc')->get();
        return view('cms.sales.create', compact('sale', 'products', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleRequest $request, Sale $sale)
    {
        $sale_old = Sale::find($sale->id);
        

        if($sale->update($request->validated())){
            // update the product quantity
            $product = Product::find($request->product_id);
            $product->quantity =( $product->quantity + $sale_old->quantity) - $request->quantity;
            $product->save();

            // Find and Update inventory
            $inventory = Inventory::where('product_id', $request->product_id)->first();
            if($inventory){
                $inventory->quantity_available =  $product->quantity;
                $inventory->save();
            }else{
                Inventory::create([
                    'product_id' => $request->product_id,
                    'quantity_available' => $product->quantity
                ]);
            }
        }

        // Redirect the user to the user's profile page
        return redirect()
            ->route('sales.index')
            ->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        if ($sale->delete()) {
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
