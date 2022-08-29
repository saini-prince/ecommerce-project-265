@extends('admin.layout.app')

@section('heading','Edit Category')

@section('button')
<a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> All Categories</a>
@endsection


@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_category_update',$category_single->id) }}" method="post" enctype="multipart/form-data">
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
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="category_name" value="{{$category_single->category_name}}">
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Status</label>
                            <select class="form-control" name="category_status">
                                <option value="Active" @if($category_single->category_status=="Active") selected @endif>Active</option>
                                <option value="Inactive" @if($category_single->category_status=="Inactive") selected @endif>Inactive</option>
                            </select>
                            @error('category_status')
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