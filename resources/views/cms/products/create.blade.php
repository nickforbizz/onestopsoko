@extends('layouts.cms')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"> Products </h4>
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
                <a href="#">Products</a>
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
                        <h4 class="card-title">Add Record</h4>
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-round ml-auto">
                            <i class="flaticon-left-arrow-4 mr-2"></i>
                            View Records
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <!-- form -->
                    @include('cms.helpers.partials.feedback')
                    <form id="products-create" action="@if(isset($product->id))
                            {{ route('products.update', ['product' => $product->id]) }}
                            @else {{ route('products.store' ) }} @endif"
                        method="post"
                        enctype="multipart/form-data">

                        @csrf
                        @if(isset($product->id))
                        @method('PUT')
                        <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                        @endif


                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input id="title" type="text" class="form-control "
                                        name="title"
                                        placeholder="Enter title ..."
                                        value="{{ old('title', $product->title ?? '')  }}" />
                                    @error('title') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="product_category" class="form-control">
                                        <option selected disabled> -- No item --</option>
                                        @foreach(get_model_items(1, 'ProductCategory', 'active') as $category)
                                        <option value="{{ $category->id }}"
                                            @if(isset($product->id) && $category->id == $product->category_id)
                                            selected
                                            @endif>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="slug"> Price</label>
                                    <input id="price" name="price" type="number" class="form-control "
                                        value="{{ old('price', $product->price ?? '') }}" placeholder="Enter price ..."/>
                                    @error('price') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="slug"> Quantity</label>
                                    <input id="quantity" name="quantity" type="number" class="form-control "
                                        value="{{ old('quantity', $product->quantity ?? '') }}" placeholder="Enter quantity ..."/>
                                    @error('quantity') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="slug"> Quantity Alert</label>
                                    <input id="quantity_alert" name="quantity_alert" type="number" class="form-control "
                                        value="{{ old('quantity_alert', $product->quantity_alert ?? '') }}" placeholder="Enter quantity alert ..."/>
                                    @error('quantity_alert') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"
                                class="form-control  tiny_textarea"
                                placeholder="Enter description ...">{{ old('description', $product->description ?? '') }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group form-floating-label">
                            <label for="featuredimg" class=""> Photo </label>
                            <input id="featuredimg" type="file" class="form-control input-border-bottom"
                                name="featuredimg" />
                            @if (isset($product->photo))
                            <img id="blah" src="{{ asset('storage/'.$product->photo) }}" alt="current image"
                                height="100px" />
                            @else
                            <img id="blah" src="#" alt="no image" height="100px" />
                            @endif
                            @error('photo') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

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
        $("#featuredimg").change(function() {
            readURL(this);
        });

        $('#createallcb').change(function() {
            $('.perm_check').prop('checked', $(this).prop('checked'));
        });
    });
</script>

@endpush