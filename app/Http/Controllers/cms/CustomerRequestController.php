<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequestForm;
use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\CustomerRequest;
use DataTables;

class CustomerRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return datatable of the makes available
        $data = CustomerRequest::orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return date_format($row->created_at, 'Y/m/d H:i');
                })
                ->editColumn('DateSubmitted', function ($row) {
                    return date_format($row->DateSubmitted, 'Y/m/d');
                })
                ->editColumn('client_id', function ($row) {
                    return $row->client->name;
                })
                ->addColumn('action', function ($row) {
                    $btn_edit = $btn_del = null;
                    if (auth()->user()->hasAnyRole('superadmin|admin|editor') || auth()->id() == $row->created_by) {
                        $btn_edit = '<a data-toggle="tooltip" 
                                        href="' . route('customerrequests.edit', $row->id) . '" 
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
                                    onclick="delRecord(`' . $row->id . '`, `' . route('customerrequests.destroy', $row->id) . '`, `#tb_customerrequests`)"
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
        return view('cms.customerrequests.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        return view('cms.customerrequests.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequestForm $request)
    {
        CustomerRequest::create($request->validated());
        return redirect()->back()->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerRequest $customerrequest)
    {
        return response()
            ->json($customerrequest, 200, ['JSON_PRETTY_PRINT' => JSON_PRETTY_PRINT]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerRequest $customerrequest)
    {
        $clients = Client::all();
        return view('cms.customerrequests.create', compact('customerrequest', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequestForm $request, CustomerRequest $customerrequest)
    {

        $customerrequest->update($request->validated());

        // Redirect the user to the user's profile page
        return redirect()
            ->route('customerrequests.index')
            ->with('success', 'Record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerRequest $customerrequest)
    {
        if ($customerrequest->delete()) {
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
