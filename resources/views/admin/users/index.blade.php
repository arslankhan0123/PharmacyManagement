@extends('layouts.main')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">All Users</h3>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{route('user.create')}}" class="nav-link">
                            <p>Add User</p>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <a href="{{ url('/User/Edit/' . $user->id) }}"><i class="fas fa-edit" style="font-size:20px"></i></a>&nbsp;&nbsp;&nbsp;
                                <a href="{{ url('/User/Delete/' . $user->id) }}"><i class="fa fa-trash" style="font-size:20px"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection