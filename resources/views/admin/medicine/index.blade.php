@extends('layouts.main')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="card-title">All Medicines</h3>
                    </div>
                    <div class="col-md-2 text-right">
                        <a href="{{route('medicine.create')}}" class="nav-link">
                            <p>Add Medicine</p>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Medicine Name</th>
                            <th>Quantity</th>
                            <th>Purchasing Price</th>
                            <th>Selling Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicines as $medicine)
                        <tr>
                            <td>{{$medicine->medicine_name}}</td>
                            <td>{{$medicine->quantity}}</td>
                            <td>{{$medicine->purchasing_price}}</td>
                            <td>{{$medicine->selling_price}}</td>
                            <td>
                                <a href="{{ route('medicine.edit', ['id' => $medicine->id]) }}"><i class="fas fa-edit" style="font-size:20px"></i> Edit</a>&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('medicine.delete', ['id' => $medicine->id]) }}"><i class="fa fa-trash" style="font-size:20px"></i> Delete</a>
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