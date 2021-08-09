@extends('layout.layout')
@section('title', 'Delivery Fleet List')
@section('body')

<!-- ALERT SUCCESS ADD DELIVERY FLEET -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- ADD DELIVERY FLEET MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Data Delivery Fleets</h2>
    </div>
    <div class="col-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deliveryFleet">
            Add Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deliveryFleet" tabindex="-1" aria-labelledby="deliveryFleetLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deliveryFleetLabel">Add Data Delivery Fleet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <form action="/delivery-fleet" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="deliveryFleetsName" class="form-label">Delivery Fleet Name</label>
                            <input name="name" type="text" class="form-control" id="deliveryFleetsName" placeholder="Truck">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="deliveryFleetsName" class="form-label">Delivery Fleet Type</label>
                            <select class="form-control" aria-label="Default select example" name="delivery_type_id" id="deliveryType">
                                <option value="">-= Pilih Jenis Pengiriman =-</option>
                                @foreach($deliveryFleetsData['types'] as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DATA DELIVERY FLEET -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Delivery Type</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($deliveryFleetsData['fleets'] as $deliveryFleet)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $deliveryFleet->name }}</td>
            <td>{{ $deliveryFleet->deliveryType->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/delivery-fleet/{{ $deliveryFleet->id }}/edit">Edit</a>
                <a class="badge bg-danger btn" href="/delivery-fleet/{{ $deliveryFleet->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection