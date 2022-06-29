@extends('master')
@section('body')
    <div class="card" id="form">
        <div class="card-body">
            <h5 class="card-title">Ajax Crud With Laravel</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="col-12">
                    <label for="addressOne" class="form-label">Address</label>
                    <input type="text" class="form-control" id="addressOne" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                    <label for="addressTwo" class="form-label">Address 2</label>
                    <input type="text" class="form-control" id="addressTwo" placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city">
                </div>
                <div class="col-md-4">
                    <label for="state" class="form-label">State</label>
                    <select id="state" class="form-select">
                        <option selected>Choose...</option>
                        <option>Satkhira</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="zip">
                </div>
                <div class="col-12">
                    <button type="submit" id="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">All Info Goes here</h5>
            <table class="table table-dark table-striped-columns">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Zip</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody id="tbody">
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address_one }}</td>
                        <td>{{ $item->city }}</td>
                        <td>{{ $item->state }}</td>
                        <td>{{ $item->zip }}</td>
                        <td><button type="button" class="btn btn-info btn-sm mr-2" onclick="Delete({{ $item->id }});">Delete</button><button type="button" class="btn btn-primary btn-sm" onclick="Edit({{ $item->id }});">Edit</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
