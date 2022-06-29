@extends('master')
@section('body')
    <div class="card" id="form">
        <div class="card-body">
            <h5 class="card-title">Edit Data</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $data->name }}" id="name">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $data->email }}" id="email">
                </div>
                <div class="col-12">
                    <label for="addressOne" class="form-label">Address</label>
                    <input type="text" class="form-control" id="addressOne" value="{{ $data->address_one }}" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                    <label for="addressTwo" class="form-label">Address 2</label>
                    <input type="text" class="form-control" id="addressTwo" value="{{ $data->address_two }}" placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" value="{{ $data->city }}" id="city">
                </div>
                <div class="col-md-4">
                    <label for="state" class="form-label">State</label>
                    <select id="state" class="form-select">
                        <option>Choose...</option>
                        <option value="Satkhira" {{ $data->state == 'Satkhira' ? 'selected' : '' }}>Satkhira</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="text" class="form-control" value="{{ $data->zip }}" id="zip">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" onclick="update({{ $data->id }})">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection
