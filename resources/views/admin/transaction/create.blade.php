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
            
            {{ Form::open(['route' => 'transaction.import', 'method' => 'post', 'files' => true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Import excel</h3>
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

                        <div class="form-group">
                            {{ Form::label('import', 'File Excel') }}
                            {{ Form::file('import', ['class' => 'form-control']) }}
                        </div>
    
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('transaction.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Import</button>
                    </div>
                </div>
            {{ Form::close() }}

        </div>
    </div>
@endsection