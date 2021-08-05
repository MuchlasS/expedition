@extends('layout.layout')
@section('title', 'Area List')
@section('body')

<!-- ALERT SUCCESS ADD AREAS -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- ADD AREAS MODAL -->
<div class="row">
    <div class="col-6">
        <h2>Data Area</h2>
    </div>
    <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rolesModel">
            Add Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="rolesModel" tabindex="-1" aria-labelledby="areasModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="areasModelLabel">Add Data Roles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/area" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="areasName" class="form-label">Area Name</label>
                            <input name="name" type="text" class="form-control" id="areasName" placeholder="SUMATERA">
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
<!-- DATA AREAS -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($area as $ar)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $ar->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/area/{{ $ar->id }}/edit">Edit</a>
                <a class="badge bg-danger btn" href="/area/{{ $ar->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection