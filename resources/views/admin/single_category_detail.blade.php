@extends('admin.layout.app')

@section('heading','')

@section('button')
<a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> All Categories</a>
@endsection

@section('main_content')


    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <h1>{{ $category_single->category_name }}</h1>
                        <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Product Name</th>
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
                                            
                                            <td>{{ $item->product_description}}</td>
                                            <td>
                                                <img src="{{ asset('uploads/'.$item->product_image)}}" style="width:200px; height:200px;" >
                                            </td>
                                            <td>{{ $item->product_status}}</td>
                                            <td class="pt_10 pb_10">
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
