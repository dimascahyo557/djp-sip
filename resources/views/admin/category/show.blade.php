@extends('admin.admin')
@section('title', 'Category')
@section('content-title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Category</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
    <div class="row">
        <div class="col">
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail category</h3>
                </div>
                <div class="card-body">
                    
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Enter category" disabled>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->status }}" placeholder="Enter category" disabled>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ url('admin/category') }}" class="btn btn-outline-info">Back</a>
                </div>
            </div>

        </div>
    </div>
@endsection