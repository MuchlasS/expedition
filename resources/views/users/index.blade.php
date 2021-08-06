@extends('layout.layout')
@section('title', 'Users List')
@section('body')

<!-- ALERT SUCCESS ADD USERS -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- ADD USERS MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Data Users</h2>
    </div>
    <div class="col-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#usersModel">
            Add Data Admin
        </button>
        <!-- Modal -->
        <div class="modal fade" id="usersModel" tabindex="-1" aria-labelledby="usersModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="usersModelLabel">Add User Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <form action="/register" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="usersName" class="form-label">Admin Name</label>
                            <input name="name" type="text" class="form-control" id="usersName" placeholder="Admin">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="usersEmail" class="form-label">Admin Email</label>
                            <input name="email" type="email" class="form-control" id="usersEmail" placeholder="admin@email.com">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="usersPassword" class="form-label">Admin Password</label>
                            <input name="password" type="password" class="form-control" id="usersPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="usersRole" class="form-label">Role</label>
                            <input type="text" class="form-control" id="usersRole" value="Admin" disabled>
                            <input name="role_id" value="1" type="hidden" id="usersRole">
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
<!-- DATA USERS -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usersData as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/user/{{ $user->id }}/edit">Edit</a>
                <a class="badge bg-danger btn" href="/user/{{ $user->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection