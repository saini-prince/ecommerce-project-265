@extends('admin.layout.app')

@section('heading','Create Product')

@section('button')
<a href="{{ route('admin_product_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> All Products</a>
@endsection

@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_product_store') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="product_name" value="">
                            @error('product_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $row)
                                    @if($row->category_status=="Active")
                                    <option value="{{ $row->id }}"> {{ $row->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div> 
                        <div class="form-group mb-3">
                            <label>Product Description</label>
                            <textarea name="product_description" class="form-control h_100" cols="30" rows="10"></textarea>
                            @error('product_description')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Product Image</label>
                            <div>
                                <input type="file" name="product_image">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Product Status</label>
                            <select class="form-control" name="product_status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</div>

@endsection