@extends('layout.layout')
@section('title', 'Role Edit')
@section('body')

<div class="row">
    <div class="col-6">
        <h2>Edit Roles Data</h2>
    </div>
</div>
<form action="/roles/{{$editData->id}}/edit" method="post">
    {{ csrf_field() }}
    <div class="mb-3 form-group">
        <label for="rolesName" class="form-label">Role Name</label>
        <input name="role_name" type="text" class="form-control" id="rolesName" value="{{$editData->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>

@endsection