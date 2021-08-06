@extends('layout.layout')
@section('title', 'Users List')
@section('body')
<!-- ADD USERS MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Edit Data Users</h2>
    </div>
    <div class="col-12">
        <form action="/user/{{$usersData['users']->id}}/edit" method="POST">
        {{ csrf_field() }}
            <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="usersName" class="form-label">User Name</label>
                    <input name="name" type="text" class="form-control" id="usersName" value="{{ $usersData['users']->name }}">
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="usersEmail" class="form-label">User Email</label>
                    <input name="email" type="email" class="form-control" id="usersEmail" value="{{ $usersData['users']->email }}">
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3 form-group">
                    <label>User Role</label>
                    <select class="form-control" name="role_id">
                        @foreach($usersData['roles'] as $roles)
                        <option value="{{ $roles->id }}" {{ $roles->id == $usersData['users']->role_id ? 'selected' : '' }}>{{ $roles->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/user" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

@endsection