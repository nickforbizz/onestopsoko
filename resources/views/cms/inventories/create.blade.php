@extends('layouts.cms')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">  Inventory  </h4>
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
                <a href="#"> Inventory </a>
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
                        <a href="{{ route('inventories.index') }}" class="btn btn-primary btn-round ml-auto" >
                            <i class="flaticon-left-arrow-4 mr-2"></i>
                            View Records
                        </a> 
                    </div>
                </div>
                <div class="card-body">

                    <!-- form -->
                    @include('cms.helpers.partials.feedback')
                    <form id="inventories-create" 
                            action="@if(isset($inventory->id))  
                            {{ route('inventorys.update', ['inventory' => $inventory->id]) }}
                            @else {{ route('inventories.store' ) }} @endif"  
                            method="post" 
                            enctype="multipart/form-data">

                        @csrf
                        @if(isset($inventory->id))
                            @method('PUT')
                            <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                        @endif


                        <div class="form-group">
                            <label for="product_id"> Product </label>
                            <select name="product_id" id="product_id" class="form-control form-control">
                                @forelse($products as $product)
                                    <option value="{{ $product->id }}" @if(isset($inventory->id)) {{  $product->id == $inventory->product_id ? 'selected' : '' }} @endif> {{ $client->name }} </option>
                                @empty
                                    <option selected disabled> -- No item -- </option> 
                                @endforelse
                            </select>
                            @error('product_id') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group ">                            
                            <label for="quantity_available" >Quantity Available</label>
                            <input id="quantity_available" type="number" class="form-control  @error('quantity_available') is-invalid @enderror" name="quantity_available" placeholder="Enter your value" value="{{ $inventory->quantity_available ?? '' }}" required />                        
                            @error('quantity_available') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="location" class="placeholder"> Location </label>
                            <input id="name" type="text" class="form-control  @error('location') is-invalid @enderror" name="location"  value="{{ $inventory->location ?? 'Main branch' }}" placeholder="Enter your value"  />
                            @error('location') <span class="text-danger">{{ $message }}</span>
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