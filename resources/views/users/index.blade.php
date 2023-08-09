@extends('layouts.app')

@section('content')
<style>
  th{
    background-color: aqua;
  }
</style>
<div class="row">
    <div class="col-lg-6">        
        <h2>Users Management</h2>        
    </div>
    <div class="col-lg-6 text-end">
      <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>        
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
    <th>Email</th>
    <th class="text-center">Roles</th>
    <th padding-left:6% width="200px" class="text-center">Action</th>
  </tr>
  @foreach ($data as $key => $user)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td class="text-center">
        @if(!empty($user->getRoleNames()))
          @foreach($user->getRoleNames() as $v)
            <label class="badge"  style="height:30px; width:85px; padding-top:7px; font-size: 100%; background-color: rgba(230, 173, 200, 0.734); color: black;">{{ $v }}</label>
          @endforeach
        @endif
      </td>
      <td class="text-center">
        <a class="btn btn-outline-primary" style=" background-color: #d0e2ff" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye" style="height:20px;"></i></a>&nbsp;&nbsp;
        <a class="btn btn-outline-info" style=" background-color: #cff4fc" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-pencil" style="height:20px;"></i></a>&nbsp;&nbsp;
        {{-- <a class="btn btn-danger" href="{{ route('users.destroy',$user->id) }}"><i class="fa fa-trash"></i></a> --}}
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline;']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger','style' => 'height:35px; width:68px; background-color: #f1aeb5']) !!}
          {!! Form::close() !!}
      </td>
    </tr>
  @endforeach
  </table>
</div>
{!! $data->render() !!}

@endsection