@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
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
        <th width="200px" class="text-center">Action</th>
    </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-outline-primary" style=" background-color: #d0e2ff" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye" style="height:20px;"></i></a>&nbsp;&nbsp;
            @can('role-edit')
                <a class="btn btn-outline-info" style=" background-color: #cff4fc" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil" style="height:20px;"></i></a>
            @endcan&nbsp;&nbsp;
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger','style' => 'height:35px; width:68px; background-color: #f1aeb5']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
    </table>
</div>
{!! $roles->render() !!}

@endsection