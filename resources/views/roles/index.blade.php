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
        <h2>Data Roles</h2>
    </div>
    <div class="col-6">
        <x-roles.forms.modal label="Add" urlAction="/roles"/>
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
                <x-roles.forms.modal label="Edit" urlAction="/roles/{{$role->id}}/edit" value="{{session('editData')}}" />
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection