@extends('admin.admin')
@section('title', 'Sales')
@section('content-title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Sales</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Sales</li>
      </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
    <div class="row">
        <div class="col">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @elseif (session('failed'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('failed') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sales</h3>

                    <div class="card-tools">
                        <a href="{{ route('transaction.create') }}" class="btn btn-tool">
                            <i class="fas fa-plus"></i>
                            Add data
                        </a>
                        <a href="{{ route('transaction.export') }}" class="btn btn-tool">
                            <i class="fas fa-download"></i>
                            Export
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->product->name }}</td>
                                    <td>{{ $transaction->trx_date }}</td>
                                    <td>{{ $transaction->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    {{ $transactions->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection