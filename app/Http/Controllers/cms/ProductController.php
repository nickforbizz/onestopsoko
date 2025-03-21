<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Helpers\GlobalHelper;
use DataTables;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Inventory;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return datatable of the makes available
        $data = Product::orderBy('created_at', 'desc')->get();

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return date_format($row->created_at, 'Y/m/d H:i');
                })
                ->editColumn('photo', function ($row) {
                    return '<img class="tb_img" src="' . asset('assets/img/products/' . $row->photo) . '" alt="' . $row->slug . '" data-toggle="popover" data-placement="top" data-content="<img src=' . url('storage/' . $row->photo) . ' style=\'max-height: 200px; max-width: 200px;\'>">';
                })
                ->editColumn('category_id', function ($row) {
                    return $row->product_category->name;
                })
                ->editColumn('title', function ($row) {
                    return Str::limit($row->title, 10, '...');
                })
                ->editColumn('price', function ($row) {
                    return 'Ksh ' . number_format($row->price);
                })->editColumn('quantity', function ($row) {
                    return $row->quantity;
                })
                ->editColumn('quantity_alert', function ($row) {
                    return $row->quantity_alert;
                })
                ->addColumn('action', function ($row) {
                    $btn_edit = $btn_del = null;
                    if (auth()->user()->hasAnyRole('superadmin|admin|editor') || auth()->id() == $row->created_by) {
                        $btn_edit = '<a data-toggle="tooltip"
                                    href="' . route('products.edit', $row->id) . '"
                                    class="btn btn-link btn-primary btn-lg"
                                    data-original-title="Edit Record">
                                <i class="fa fa-edit"></i>
                            </a>';
                    }

                    if (auth()->user()->hasAnyRole('superadmin|admin')) {
                        $btn_del = '<button type="button"
                                    data-toggle="tooltip"
                                    title=""
                                    class="btn btn-link btn-danger"
                                    onclick="delRecord(`' . $row->id . '`, `' . route('products.destroy', $row->id) . '`, `#tb_products`)"
                                    data-original-title="Remove">
                                <i class="fa fa-times"></i>
                            </button>';
                    }
                    return $btn_edit . $btn_del;
                })
                ->rawColumns(['photo', 'category_id', 'title', 'price', 'quantity', 'quantity_alert', 'created_at', 'action'])
                ->make(true);
        }

        // render view
        return view('cms.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_categories = ProductCategory::where('active', 1)->get();
        return view('cms.products.create', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $imageName = 'default.png';
        if ($request->has('featuredimg')) {
            $image = $request->file('featuredimg');
            $imageName = store_image($image);
        }

        $product = Product::firstOrCreate(
            [
                'title' => $request->title,
                'category_id' => $request->category_id, // Search by these fields
            ],
            [
                'description' => $request->description,
                'slug' => Str::slug($request->title),
                'price' => $request->price,
                'quantity' => $request->quantity,
                'quantity_alert' => $request->quantity_alert,
                'photo' => $imageName,
                'created_by' => Auth::id(),
            ]
        );

        if ($product) {
            Inventory::create([
                'product_id' => $product->id,
                'quantity_available' => $request->quantity,
                'last_updated'=> date('Y-m-d H:i:s'),
                'created_by' => Auth::id(),
            ]);
            return redirect()
                ->route('products.index')
                ->with('success', 'Record Created Successfully');
        }

        return redirect()
            ->route('cms.products.create')
            ->with('error', 'Error while creating record');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('cms.products.create', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $image = $request->file('featuredimg');
        $imageName = $image ? store_image($image) : $product->photo;

        $product->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'price' => $request->price,
            'quantity' => $request->quantity,
            'quantity_alert' => $request->quantity_alert,
            'photo' => $imageName,
        ]);

        if ($product) {
            // check if product has inventory
            if (!Inventory::where('product_id', $product->id)->count()) {
                Inventory::create([
                    'product_id' => $product->id,
                    'quantity_available' => $request->quantity,
                    'last_updated'=> date('Y-m-d H:i:s'),
                    'created_by' => Auth::id(),
                ]);
            }else{
                // update inventory
                Inventory::where('product_id', $product->id)->update([
                    'quantity_available' => $product->quantity,
                    'last_updated'=> date('Y-m-d H:i:s'),
                    'created_by' => Auth::id(),
                ]);

            }

            
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // delete product's profile image if it exists
        if ($product->photo && Storage::disk('public')->exists($product->photo)) {
            Storage::disk('public')->delete($product->photo);
        }

        if ($product->delete()) {
            return response()->json([
                'code' => 1,
                'msg' => 'Record deleted successfully'
            ]);
        }

        return response()->json([
            'code' => -1,
            'msg' => 'Record did not delete'
        ]);
    }

    // -------------------------- CART Logic code --------------------------

    /**
     * View Cart Busket
     *
     * @return void
     */
    public function cart()
    {
        return view('cart');
    }


    /**
     * Add Product to Cart
     *
     * @param  [type] $id
     * @return void
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    /**
     * Update Cart Item
     *
     * @param Request $request
     * @return void
     */
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    /**
     * Remove Cart Item
     *
     * @param Request $request
     * @return void
     */
    public function removeCartItem(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
    // ----------------------------- END CART logic code -----------------------------
}
