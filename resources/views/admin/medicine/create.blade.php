@extends('layouts.main')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Medicine</h3>
                    </div>
                    <form id="medicineForm" action="{{route('medicine.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Medicine Name</label>
                                        <input type="text" name="medicine_name" value="{{ old('medicine_name') }}" class="form-control" id="medicine_name" placeholder="Enter medicine name">
                                        @error('medicine_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Quantity</label>
                                        <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control" id="quantity" placeholder="Enter quantity">
                                        @error('quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Purchasing Price</label>
                                        <input type="number" name="purchasing_price" value="{{ old('purchasing_price') }}" class="form-control" id="purchasing_price" placeholder="Enter Purchasing Price">
                                        @error('purchasing_price')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Selling Price</label>
                                        <input type="number" name="selling_price" value="{{ old('selling_price') }}" class="form-control" id="selling_price" placeholder="Enter Selling Price">
                                        @error('selling_price')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Expiry Date</label>
                                        <input type="date" name="expiry_date" value="{{ old('expiry_date') }}" class="form-control" id="expiry_date" placeholder="Enter expiry_date">
                                        @error('expiry_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection