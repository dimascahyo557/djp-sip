@extends('admin.admin')
@section('title', 'Product')
@section('content-title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Product</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Product</li>
      </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
    <div class="row">
        <div class="col">
            
            {{ Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add product</h3>
                    </div>
                    <div class="card-body">
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('category_id', 'Category') }}
                                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Choose category']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('name') }}
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('price', 'Price') }}
                                    {{ Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Enter price']) }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {{ Form::label('sku', 'SKU') }}
                                    {{ Form::text('sku', null, ['class' => 'form-control', 'placeholder' => 'Enter sku']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('status', 'Status') }}
                                    {{ Form::select('status', ['active' => 'Active', 'inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Choose status']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('image') }}
                                    {{ Form::file('image', ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('description') }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter sku', 'rows' => 4]) }}
                        </div>
    
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('admin/category') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Add Product</button>
                    </div>
                </div>
            {{ Form::close() }}

        </div>
    </div>
@endsection