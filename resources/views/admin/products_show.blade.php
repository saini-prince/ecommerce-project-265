@extends('admin.layout.app')

@section('heading','All Products')

@section('button')
<a href="{{ route('admin_product_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Product</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product_name}}</td>
                                        <td>
                                            {{ $item->rCategory->category_name }}
                                        </td>
                                        <td>{{ $item->product_description}}</td>
                                        <td>
                                            <img src="{{ asset('uploads/'.$item->product_image)}}" style="width:200px; height:200px;" >
                                        </td>
                                        <td>{{ $item->product_status}}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_single_product',$item->id) }}" class="btn btn-primary" >View</a>
                                            <a href="{{ route('admin_product_edit',$item->id) }}" class="btn btn-primary" >Edit</a>
                                            <a href="{{ route('admin_product_delete',$item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
