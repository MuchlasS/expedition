@extends('layout.layout')
@section('title', 'Edit User')
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
        <h2>Data User</h2>
    </div>
</div>
<!-- DATA ROLES -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">HP</th>
            <th scope="col-2">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Office Name</th>
            <th scope="col">Office Telephone</th>
            <th scope="col">Office Address</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($userData as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->hp }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->gender == 'M' ? 'Male' : 'Female' }}</td>
            <td>{{ $user->officeInfo->office_name }}</td>
            <td>{{ $user->officeInfo->office_telephone }}</td>
            <td>{{ $user->officeInfo->office_address }}</td>
            <td>{{ $user->roles->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/user/{{ $user->id }}/edit">Edit</a>
                <a class="badge bg-warning btn" href="/change-password/{{ $user->id }}">Edit Password</a>
                <a class="badge bg-danger btn" href="/user/{{ $user->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection