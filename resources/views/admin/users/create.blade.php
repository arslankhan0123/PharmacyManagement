@extends('layouts.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <form id="userForm" action="{{url('User/Store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Password</label>
                                <input type="password" name="paasword" class="form-control" id="paasword" placeholder="Enter paasword">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Select User Role</label>
                                <select class="form-control select2" name="user_role" style="width: 100%;">
                                    <option value="Admin" selected="selected">Admin</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="User">User</option>
                                </select>
                                @error('user_role')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</section>
@endsection