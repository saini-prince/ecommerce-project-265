@extends('admin.layout.app')

@section('heading','Create Category')

@section('button')
<a href="{{ route('admin_category_show') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Category</a>
@endsection

@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_category_store') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="category_name" value="">
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Status</label>
                            <select class="form-control" name="category_status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</div>

@endsection