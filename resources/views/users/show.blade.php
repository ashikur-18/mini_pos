@extends('layout.main')

@section('main_content')
<div class="row clearfix page_header mb-4">
    <div class="col-md-4">
        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back </a>	
    </div>
    <div class="col-md-8 text-right">
        <a class="btn btn-info btn-sm" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New Sale </a>
        <a class="btn btn-info btn-sm" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New purchase </a>
        <a class="btn btn-info btn-sm" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New Payment </a>
        <a class="btn btn-info btn-sm" href="{{ url('users/create') }}"> <i class="fa fa-plus"></i> New Receipt </a>
    </div>
</div>

<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
       <div class="row clearfix justify-content-md-center">
            <div class="col-md-8">
                <table class="table table-striped btn-sm">
                    <tr>
                        <th class="text-right">Group :</th>
                        <td>{{ $user->group->title }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Name :</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Email :</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Phone :</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Addres :</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                </table>
            </div>
       </div>
    </div>
  </div>
@stop