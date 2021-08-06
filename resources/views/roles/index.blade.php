@extends('layout.layout')
@section('title', 'Roles List')
@section('body')

<!-- ALERT SUCCESS ADD ROLES -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- ADD ROLES MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Data Roles</h2>
    </div>
    <div class="col-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#rolesModel">
            Add Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="rolesModel" tabindex="-1" aria-labelledby="rolesModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rolesModelLabel">Add Data Roles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <form action="/roles" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="rolesName" class="form-label">Role Name</label>
                            <input name="role_name" type="text" class="form-control" id="rolesName" placeholder="Admin">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DATA ROLES -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rolesData as $role)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $role->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/roles/{{ $role->id }}/edit">Edit</a>
                <!-- <a class="badge bg-danger btn" href="/roles/{{ $role->id }}/delete">Delete</a> -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection