@extends('admin.layout.app')

@section('heading','Product')

@section('button')
<a href="{{ route('admin_product_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> All Products</a>
@endsection

@section('main_content')


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                            <img src="{{ asset('uploads/'.$product_single->product_image)}}" style="width:200px; height:200px;" >
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Product Name</label>
                                    <span class="form-control" name="name" value="{{$product_single->product_name}}">{{$product_single->product_name}}</span>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Product Category</label>
                                    <span class="form-control" name="category_id" value="{{$product_single->rCategory->category_name}}">{{$product_single->rCategory->category_name}}</span>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Product Description</label>
                                    <p name="product_description" value="{{$product_single->product_description}}">{{$product_single->product_description}}</p>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Product Status</label>
                                    <span class="form-control" name="product_status" value="{{$product_single->product_status}}">{{$product_single->product_status}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection