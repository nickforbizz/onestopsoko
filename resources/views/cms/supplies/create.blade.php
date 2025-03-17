@extends('layouts.cms')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"> Supplies </h4>
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
                <a href="#"> Supply </a>
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
                        <a href="{{ route('supplies.index') }}" class="btn btn-primary btn-round ml-auto">
                            <i class="flaticon-left-arrow-4 mr-2"></i>
                            View Records
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <!-- form -->
                    @include('cms.helpers.partials.feedback')
                    <form id="clients-create"
                        action="@if(isset($supply->id))  
                            {{ route('supplies.update', ['supply' => $supply->id]) }}
                            @else {{ route('supplies.store' ) }} @endif"
                        method="post"
                        enctype="multipart/form-data">

                        @csrf
                        @if(isset($supply->id))
                        @method('PUT')
                        <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier_id"> Supplier </label>
                                    <select name="supplier_id" id="supplier_id" class="form-control form-control" required>
                                        <option selected disabled> -- Select Client -- </option>
                                        @forelse($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" @if(isset($supply->id)) {{ $supplier->id == $supply->supplier_id ? 'selected' : '' }} @endif> {{ $supplier->name }} </option>
                                        @empty
                                        <option selected disabled> -- No item -- </option>
                                        @endforelse
                                    </select>
                                    @error('supplier_id') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_id"> Product </label>
                                    <select name="product_id" id="product_id" class="form-control form-control" required>
                                        <option selected disabled> -- Select Product -- </option>
                                        @forelse($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}" @if(isset($supply->id)) {{ $product->id == $supply->product_id ? 'selected' : '' }} @endif> {{ $product->title }} </option>
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
                                        value="{{ old('amount', $supply->amount ?? '') }}" placeholder="Enter amount ..."  />
                                    @error('amount') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity"> Quantity </label>
                                    <input id="quantity" name="quantity" type="number" class="form-control "
                                        value="{{ old('quantity', $supply->quantity ?? '1') }}" placeholder="Enter quantity ..." required />
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
                                    <label for="supply_date"> supply Date </label>
                                    <input id="supply_date" type="date" class="form-control  @error('supply_date') is-invalid @enderror" name="supply_date" placeholder="Enter your value" value="{{ old('supply_date', isset($supply->supply_date) ? \Carbon\Carbon::parse($supply->supply_date)->format('Y-m-d') : '') }}" required />
                                    @error('supply_date') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- .col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status"> Status </label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Pending" {{ old('type', $supply->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Fullfilled" {{ old('type', $supply->status ?? '') == 'Fullfilled' ? 'selected' : '' }}> Delivered</option>
                                        <option value="Cancelled" {{ old('type', $supply->status ?? '') == 'Cancelled' ? 'selected' : '' }}> Cancelled</option>
                                        <option value="Returned" {{ old('type', $supply->status ?? '') == 'Returned' ? 'selected' : '' }}> Returned </option>
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
                                    value="{{ old('total_amount', $supply->total_amount ?? '') }}" placeholder="Enter total_amount ..." readonly />
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