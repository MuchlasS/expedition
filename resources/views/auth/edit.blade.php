@extends('layout.layout')
@section('title', 'User Edit')
@section('body')

<div class="row">
    <div class="col-6">
        <h2>Edit User Data</h2>
    </div>
</div>
<form action="/user/{{$editData->id}}/edit" method="post">
    {{ csrf_field() }}
    <div class="mb-3 form-group">
        <label for="fullname" class="form-label">Full Name</label>
        <input name="name" type="text" class="form-control" id="fullname" value="{{$editData->name}}">
    </div>
    <div class="mb-3 form-group">
        <label for="Email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="Email" value="{{$editData->email}}">
    </div>
    <div class="mb-3 form-group">
        <label for="HP" class="form-label">HP</label>
        <input name="hp" type="number" class="form-control" id="HP" value="{{$editData->hp}}">
    </div>
    <div class="mb-3 form-group">
        <label for="Address" class="form-label">Address</label>
        <textarea name="address" type="text" class="form-control" id="Address">{{$editData->address}}</textarea>
    </div>
    <div class="mb-3 form-group">
        <label for="gender" class="form-label">Gender</label>
        <div class="form-check">
            <input {{$editData->gender == 'M' ? 'checked' : ''}} value="M" class="form-check-input" type="radio" name="gender" id="gender_male">
            <label class="form-check-label" for="gender_male">
                Male
            </label>
        </div>
        <div class="form-check">
            <input {{$editData->gender == 'F' ? 'checked' : ''}} value="F" class="form-check-input" type="radio" name="gender" id="gender_female">
            <label class="form-check-label" for="gender_female">
                Female
            </label>
        </div>
    </div>
    <div class="mb-3 form-group">
        <label for="office_name" class="form-label">Office Name</label>
        <input name="office_name" type="text" class="form-control" id="name" value="{{$editData->officeInfo->office_name}}">
    </div>
    <!-- <div class="mb-3 form-group">
        <label for="office_email" class="form-label">Office Email</label>
        <input name="office_email" type="email" class="form-control" id="email" value="{{$editData->officeInfo->office_email}}">
    </div> -->
    <div class="mb-3 form-group">
        <label for="office_telephone" class="form-label">Office Telephone</label>
        <input name="office_telephone" type="number" class="form-control" id="hp" value="{{$editData->officeInfo->office_telephone}}">
    </div>
    <div class="mb-3 form-group">
        <label for="office_address" class="form-label">Office Address</label>
        <textarea name="office_address" type="text" class="form-control" id="office_address">{{$editData->officeInfo->office_address}}</textarea>
    </div>
    <!-- <div class="hidden mb-3 form-group">
        <label for="roles_id" class="form-label">Roles</label>
        <textarea name="roles_id" class="form-control" id="roles_id"></textarea>
    </div> -->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

@endsection