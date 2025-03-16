@extends('layouts.cms')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">  Customer Request </h4>
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
                <a href="#"> Customer Request </a>
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
                        <a href="{{ route('customerrequests.index') }}" class="btn btn-primary btn-round ml-auto" >
                            <i class="flaticon-left-arrow-4 mr-2"></i>
                            View Records
                        </a> 
                    </div>
                </div>
                <div class="card-body">

                    <!-- form -->
                    @include('cms.helpers.partials.feedback')
                    <form id="clients-create" 
                            action="@if(isset($customerrequest->id))  
                            {{ route('customerrequests.update', ['customerrequest' => $customerrequest->id]) }}
                            @else {{ route('customerrequests.store' ) }} @endif"  
                            method="post" 
                            enctype="multipart/form-data">

                        @csrf
                        @if(isset($customerrequest->id))
                            @method('PUT')
                            <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                        @endif

                        <div class="form-group">
                            <label for="client_id"> Client </label>
                            <select name="client_id" id="client_id" class="form-control form-control">
                                @forelse($clients as $client)
                                    <option value="{{ $client->id }}" @if(isset($customerrequest->id)) {{  $client->id == $customerrequest->client_id ? 'selected' : '' }} @endif> {{ $client->name }} </option>
                                @empty
                                    <option selected disabled> -- No item -- </option> 
                                @endforelse
                            </select>
                            @error('client_id') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="request_type"> Request type </label>
                            <select name="request_type" id="request_type" class="form-control">
                                <option value="Inquiry" {{ old('type', $customerrequest->request_type ?? '') == 'Inquiry' ? 'selected' : '' }}>Inquiry</option>
                                <option value="Complaint" {{ old('type', $customerrequest->request_type ?? '') == 'Complaint' ? 'selected' : '' }}>Complaint</option>
                                <option value="Return" {{ old('type', $customerrequest->request_type ?? '') == 'Return' ? 'selected' : '' }}>Return</option>
                            </select>

                            @error('request_type') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">                            
                            <label for="Datesubmitted" > Date Submitted </label>
                            <input id="Datesubmitted" type="date" class="form-control  @error('DateSubmitted') is-invalid @enderror" name="DateSubmitted" placeholder="Enter your value" value="{{ old('DateSubmitted', isset($customerrequest->DateSubmitted) ? \Carbon\Carbon::parse($customerrequest->DateSubmitted)->format('Y-m-d') : '') }}" required />                        
                            @error('DateSubmitted') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="description" class="placeholder"> Description </label>
                            <textarea id="description" type="text" placeholder="Enter your value" class="form-control  @error('description') is-invalid @enderror" name="description" >{{ $customerrequest->description ?? '' }}</textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        
                        <div class="form-group">
                            <label for="status"> Status </label>
                            <select name="status" id="status" class="form-control">
                                <option value="Pending" {{ old('type', $customerrequest->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Resolved" {{ old('type', $customerrequest->status ?? '') == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                            </select>

                            @error('status') <span class="text-danger">{{ $message }}</span>
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