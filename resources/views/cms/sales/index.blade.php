@extends('layouts.cms')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"> Sales </h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Sale</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Index</a>
            </li>
        </ul>
    </div>
    <div class="row">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">List of Available Record(s)</h4>                      
                    </div>
                </div>
                <div class="card-body">

                    <div class="ml-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-info text-white" style="font-size: large;">
                                        Today
                                    </div>
                                    <div class="card-body ">
                                        <h5 class="card-title ">Sales: {{ $salesStats['today']['sales'] }} /= </h5>
                                        <p class="card-text">Quantity: {{ $salesStats['today']['quantity'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-info text-white" style="font-size: large;">
                                        Weekly
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Sales: {{ $salesStats['weekly']['sales'] }} /= </h5>
                                        <p class="card-text">Quantity: {{ $salesStats['weekly']['quantity'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-info text-white" style="font-size: large;">
                                        Monthly
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Sales: {{ $salesStats['monthly']['sales'] }} /= </h5>
                                        <p class="card-text">Quantity: {{ $salesStats['monthly']['quantity'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @can('create sale')
                            <a href="{{ route('sales.create') }}" class="btn btn-primary btn-round ml-auto mr-4">
                                <i class="flaticon-add mr-4"></i>
                                Add Sale
                            </a>
                            @endcan
                        </div>
                    </div>
                    <div class="table-responsive">
                        @include('cms.helpers.partials.feedback')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date_selected_records">Filter Records</label>
                                    <select class="form-control" id="date_selected_records" name="date_selected_records">
                                        <option value="">All</option>
                                        <option value="1">Today</option>
                                        <option value="2">This Week</option>
                                        <option value="3">This Month</option>
                                        <option value="4">This Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <table id="tb_sales" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Product </th>
                                    <th> Client</th>
                                    <th> Sales Date </th>
                                    <th> Quantity </th>
                                    <th> Amount </th>
                                    <th> Total Amount </th>
                                    <th> Status </th>
                                    <th> Created At </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .page-inner -->

@endsection


@push('scripts')


<script>
    $(document).ready(function() {
        salesRecords()
        $('#date_selected_records').change(function() {
            let filterValue = $(this).val().trim();
            if (filterValue === "1" || filterValue === "2" || filterValue === "3" || filterValue === "4" || filterValue === "") {
                salesRecords(filterValue);
            } else {
                console.error("Invalid filter value");
            }
        });
        // #tb_sales


    });

    function salesRecords(date_selected_records = '') {
        $('#tb_sales').DataTable().destroy();
        $('#tb_sales').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('sales.index') }}",
                data: function(d) {
                    d.date_selected_records = date_selected_records
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'product_id'
                },
                {
                    data: 'client_id'
                },
                {
                    data: 'sales_date'
                },
                {
                    data: 'quantity'
                },
                {
                    data: 'amount'
                },
                {
                    data: 'total_amount'
                },
                {
                    data: 'status'
                },

                {
                    data: 'created_at',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }
</script>

@endpush