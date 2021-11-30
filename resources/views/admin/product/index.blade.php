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

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismis="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @elseif (session('failed'))
                <div class="alert alert-success">
                    {{ session('failed') }}
                    <button type="button" class="close" data-dismis="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product</h3>

                    <div class="card-tools">
                        <a href="{{ route('product.create') }}" class="btn btn-tool">
                            <i class="fas fa-plus"></i>
                            Add data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>SKU</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->getCategory->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>
                                        @if (!empty($product->image))
                                            <img src="{{ asset('storage/product/' . $product->image) }}" height="100" alt="">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td>{{ $product->status }}</td>
                                    <td>
                                        {{ Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete']) }}
                                            <div class="btn-group">
                                                <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('product.edit', ['product', $product->id]) }}" class="btn btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection