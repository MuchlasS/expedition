@extends('layout.layout')
@section('title', 'Role Edit')
@section('body')

<div class="row">
    <div class="col-12">
        <h2>Edit Data Users</h2>
    </div>
    <div class="col-12">
        <form action="/roles/{{$editData->id}}/edit" method="POST">
        {{ csrf_field() }}
            <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="usersName" class="form-label">Role Name</label>
                    <input name="role_name" type="text" class="form-control" id="usersName" value="{{ $editData->name }}">
                </div>
            </div>
            <div class="modal-footer">
                <a href="/roles" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</form>

@endsection