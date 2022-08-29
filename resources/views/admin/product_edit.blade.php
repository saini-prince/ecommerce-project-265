@extends('admin.layout.app')

@section('heading','Edit Product')

@section('button')
<a href="{{ route('admin_product_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> All Products</a>
@endsection

@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_product_update',$product_single->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="{{$product_single->product_name}}">
                            @error('product_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $row)
                                    <option value="{{ $row->id }}" @if($product_single->category_id == $row->id) selected @endif>{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> 
                        <div class="form-group mb-3">
                            <label>Product Description</label>
                            <textarea name="product_description" value="{{$product_single->product_description}}" class="form-control h_100" cols="30" rows="10">{{$product_single->product_description}}</textarea>
                            @error('product_description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Product Image</label>
                            <div>
                                <img src="{{asset('uploads/').$product_single->product_image}}" style="width:200px; height:200px;" >
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>New Product Image</label>
                            <div>
                                <input type="file" name="product_image">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Product Status</label>
                            <select class="form-control" name="product_status">
                                <option value="Active" @if($product_single->product_status=="Active") selected @endif>Active</option>
                                <option value="Inactive" @if($product_single->product_status=="Inactive") selected @endif>Inactive</option>
                            </select>
                            @error('product_status')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
</form>
</div>

@endsection