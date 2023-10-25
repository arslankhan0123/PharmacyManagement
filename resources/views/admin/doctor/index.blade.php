@extends('layouts.main')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">All Doctors</h3>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{route('doctor.create')}}" class="nav-link">
                            <p>Add Doctor</p>
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
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                        <tr>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->email}}</td>
                            <td style="color: red;">{{$doctor->role}}</td>
                            <td>{{$doctor->created_at}}</td>
                            <td>
                                <a href="{{ route('doctor.edit', ['id' => $doctor->id]) }}"><i class="fas fa-edit" style="font-size:20px"></i></a>&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('doctor.delete', ['id' => $doctor->id]) }}"><i class="fa fa-trash" style="font-size:20px"></i></a>
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