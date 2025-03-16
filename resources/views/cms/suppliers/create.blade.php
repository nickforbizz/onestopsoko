@extends('layouts.cms')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">  Supplier </h4>
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
                <a href="#"> Supplier</a>
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
                        <a href="{{ route('suppliers.index') }}" class="btn btn-primary btn-round ml-auto" >
                            <i class="flaticon-left-arrow-4 mr-2"></i>
                            View Records
                        </a> 
                    </div>
                </div>
                <div class="card-body">

                    <!-- form -->
                    @include('cms.helpers.partials.feedback')
                    <form id="suppliers-create" 
                            action="@if(isset($supplier->id))  
                            {{ route('suppliers.update', ['supplier' => $supplier->id]) }}
                            @else {{ route('suppliers.store' ) }} @endif"  
                            method="post" 
                            enctype="multipart/form-data">

                        @csrf
                        @if(isset($supplier->id))
                            @method('PUT')
                            <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                        @endif


                        <div class="form-group ">
                            
                            <label for="name" >Name</label>
                            <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Enter your value" value="{{ $supplier->name ?? '' }}" required />                        
                            @error('name') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="phone" class="placeholder"> Phone</label>
                            <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone"  value="{{ $supplier->phone ?? '' }}" placeholder="Enter your value" required />
                            @error('phone') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="email" class="placeholder"> Email </label>
                            <input id="name" type="email" class="form-control  @error('email') is-invalid @enderror" name="email"  value="{{ $supplier->email ?? '' }}" placeholder="Enter your value" required />
                            @error('email') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="location" class="placeholder"> Location </label>
                            <input id="name" type="text" class="form-control  @error('location') is-invalid @enderror" name="location"  value="{{ $supplier->location ?? '' }}" placeholder="Enter your value" required />
                            @error('location') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="paymentterms"> Payment Terms</label>
                            <select name="paymentterms" id="paymentterms" class="form-control form-control">
                                <option value="cash">Cash</option>
                                <option value="M-pesa">M-pesa</option>
                                <option value="Credit">Credit</option>
                            </select>
                            @error('paymentterms') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        



                        <div class="card">
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
        
    });


    
</script>

@endpush