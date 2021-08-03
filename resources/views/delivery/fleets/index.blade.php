@extends('layout.layout')
@section('title', 'Roles List')
@section('body')

<!-- ALERT SUCCESS ADD ROLES -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- ADD ROLES MODAL -->
<div class="row">
    <div class="col-6">
        <h2>Data Delivery Fleets</h2>
    </div>
    <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deliveryFleets">
            Add Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deliveryFleets" tabindex="-1" aria-labelledby="deliveryFleetsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deliveryFleetsLabel">Add Data Roles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/delivery-fleet" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="fleetsName" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="fleetsName" placeholder="Trucking">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="fleetsType" class="form-label">Delivery Type</label>
                            <select name="delivery_type_id" class="form-select" aria-label="Delivery Types">
                                @foreach($fleetsData as $fleet)
                                <option value="{{$fleet->deliveryType->id}}">{{$fleet->deliveryType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DATA FLEETS -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fleetsData as $fleet)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $fleet->name }}</td>
            <td>{{ $fleet->deliveryType->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/delivery-fleet/{{ $fleet->id }}/edit">Edit</a>
                <a class="badge bg-danger btn" href="/delivery-fleet/{{ $fleet->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection