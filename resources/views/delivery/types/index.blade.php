@extends('layout.layout')
@section('title', 'Delivery Type List')
@section('body')

<!-- ALERT SUCCESS ADD DELIVERY TYPE -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- ADD DELIVERY TYPE MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Data Delivery Types</h2>
    </div>
    <div class="col-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deliveryType">
            Add Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deliveryType" tabindex="-1" aria-labelledby="deliveryTypeLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deliveryTypeLabel">Add Data Delivery Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <form action="/delivery-type" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="deliveryTypesName" class="form-label">Delivery Type Name</label>
                            <input name="name" type="text" class="form-control" id="deliveryTypesName" placeholder="Pengiriman Darat">
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
<!-- DATA DELIVERY TYPE -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($deliveryTypesData as $deliveryType)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $deliveryType->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/delivery-type/{{ $deliveryType->id }}/edit">Edit</a>
                <a class="badge bg-danger btn" href="/delivery-type/{{ $deliveryType->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection