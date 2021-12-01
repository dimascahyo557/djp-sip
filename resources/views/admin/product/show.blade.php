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
            
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail product</h3>
                </div>
                <div class="card-body">

                    @if (!empty($product->image))
                        <img src="{{ asset('storage/product/' . $product->image) }}" height="150" alt="">
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('category_id', 'Category') }}
                                {{ Form::text('category_id', $product->getCategory->name, ['class' => 'form-control', 'placeholder' => 'Choose category', 'disabled']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name') }}
                                {{ Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Enter name', 'disabled']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('price', 'Price') }}
                                {{ Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => 'Enter price', 'disabled']) }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {{ Form::label('sku', 'SKU') }}
                                {{ Form::text('sku', $product->sku, ['class' => 'form-control', 'placeholder' => 'Enter sku', 'disabled']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('status', 'Status') }}
                                {{ Form::text('status', $product->status, ['class' => 'form-control', 'placeholder' => 'Choose status', 'disabled']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('description') }}
                        {{ Form::text('description', $product->description, ['class' => 'form-control', 'placeholder' => 'Enter sku', 'disabled']) }}
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ route('product.index') }}" class="btn btn-outline-info">Back</a>
                </div>
            </div>

        </div>
    </div>
@endsection