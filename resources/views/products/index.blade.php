@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Art Work</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Art</a>
                @endcan
            </div>
        </div>
    </div>
    <hr>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th width="200px" class="text-center">Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-outline-primary" style=" background-color: #d0e2ff" href="{{ route('products.show',$product->id) }}"><i class="fa fa-eye" style="height:20px;"></i></a>&nbsp;&nbsp;
                        @can('product-edit')
                        <a class="btn btn-outline-info" style=" background-color: #cff4fc" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-pencil" style="height:20px;"></i></a>
                        @endcan&nbsp;&nbsp;

                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                        <button type="submit" class="btn btn-outline-danger" style="height:35px; background-color: #f1aeb5">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
	        @endforeach
        </table>
    </div>
    {!! $products->links() !!}

@endsection
