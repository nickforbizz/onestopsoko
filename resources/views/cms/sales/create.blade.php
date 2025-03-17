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
                <a href="#"> Sale </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Create</a>
            </li>
        </ul>
    </div>
    <div class="row">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Add|Edit Record</h4>
                        <a href="{{ route('sales.index') }}" class="btn btn-primary btn-round ml-auto">
                            <i class="flaticon-left-arrow-4 mr-2"></i>
                            View Records
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <!-- form -->
                    @include('cms.helpers.partials.feedback')
                    <form id="clients-create"
                        action="@if(isset($sale->id))  
                            {{ route('sales.update', ['sale' => $sale->id]) }}
                            @else {{ route('sales.store' ) }} @endif"
                        method="post"
                        enctype="multipart/form-data">

                        @csrf
                        @if(isset($sale->id))
                        @method('PUT')
                        <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_id"> Client </label>
                                    <select name="client_id" id="client_id" class="form-control form-control" required>
                                        <option selected disabled> -- Select Client -- </option>
                                        @forelse($clients as $client)
                                        <option value="{{ $client->id }}" @if(isset($sale->id)) {{ $client->id == $sale->client_id ? 'selected' : '' }} @endif> {{ $client->name }} </option>
                                        @empty
                                        <option selected disabled> -- No item -- </option>
                                        @endforelse
                                    </select>
                                    @error('client_id') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_id"> Product </label>
                                    <select name="product_id" id="product_id" class="form-control form-control" required>
                                        <option selected disabled> -- Select Product -- </option>
                                        @forelse($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}" @if(isset($sale->id)) {{ $product->id == $sale->product_id ? 'selected' : '' }} @endif> {{ $product->title }} </option>
                                        @empty
                                        <option selected disabled> -- No item -- </option>
                                        @endforelse
                                    </select>
                                    @error('product_id') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="amount"> Amount </label>
                                    <input id="amount" name="amount" type="number" class="form-control "
                                        value="{{ old('amount', $sale->amount ?? '') }}" placeholder="Enter amount ..." readonly />
                                    @error('amount') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity"> Quantity </label>
                                    <input id="quantity" name="quantity" type="number" class="form-control "
                                        value="{{ old('quantity', $sale->quantity ?? '1') }}" placeholder="Enter quantity ..." required />
                                    @error('quantity') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- .row -->




                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="sales_date"> Sales Date </label>
                                    <input id="sales_date" type="date" class="form-control  @error('sales_date') is-invalid @enderror" name="sales_date" placeholder="Enter your value" value="{{ old('sales_date', isset($sale->sales_date) ? \Carbon\Carbon::parse($sale->sales_date)->format('Y-m-d') : '') }}" required />
                                    @error('sales_date') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- .col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status"> Status </label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Pending" {{ old('type', $sale->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Fullfilled" {{ old('type', $sale->status ?? '') == 'Fullfilled' ? 'selected' : '' }}> Fullfilled</option>
                                        <option value="Cancelled" {{ old('type', $sale->status ?? '') == 'Cancelled' ? 'selected' : '' }}> Cancelled</option>
                                        <option value="Returned" {{ old('type', $sale->status ?? '') == 'Returned' ? 'selected' : '' }}> Returned</option>
                                    </select>

                                    @error('status') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- .row -->







                        <div class="card">
                            <div class="form-group">
                                <label for="total_amount"> Total Amount </label>
                                <input id="total_amount" name="total_amount" type="number" class="form-control "
                                    value="{{ old('total_amount', $sale->total_amount ?? '') }}" placeholder="Enter total_amount ..." readonly />
                                @error('total_amount') <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group form-floating-label">
                                <button class="btn btn-success btn-round float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- End form -->

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
        $("#product_id").change(function() {
            var price = $(this).find(':selected').data('price');
            $("#amount").val(price);
            let quantity = parseInt($("#quantity").val());
            $("#total_amount").val(price * quantity);
        });

        $("#quantity").change(function() {
            let quantity = parseInt($(this).val());
            let price = parseInt($("#amount").val());
            $("#total_amount").val(price * quantity);
        });

        $("#amount").change(function() {
            let price = parseInt($(this).val());
            let quantity = parseInt($("#quantity").val());
            $("#total_amount").val(price * quantity);
        });
    });
</script>

@endpush