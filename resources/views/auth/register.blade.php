@extends('layout.layout')
@section('title', 'Register Form')
@section('body')

<div class="row">
    <div class="col-6">
        <h2>Register Form</h2>
    </div>
</div>
<form action="/register" method="post">
    {{ csrf_field() }}
    <div class="mb-3 form-group">
        <label for="name" class="form-label">Full Name</label>
        <input name="name" type="text" class="form-control" id="name">
    </div>
    <div class="mb-3 form-group">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email">
    </div>
    <div class="mb-3 form-group">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <div class="mb-3 form-group">
        <label for="hp" class="form-label">Handphone/WhatsApp Number</label>
        <input name="hp" type="number" class="form-control" id="hp">
    </div>
    <div class="mb-3 form-group">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" class="form-control" id="address"></textarea>
    </div>
    <div class="mb-3 form-group">
        <label for="gender" class="form-label">Gender</label>
        <div class="form-check">
            <input value="M" class="form-check-input" type="radio" name="gender" id="gender_male">
            <label class="form-check-label" for="gender_male">
                Male
            </label>
        </div>
        <div class="form-check">
            <input value="F" class="form-check-input" type="radio" name="gender" id="gender_female">
            <label class="form-check-label" for="gender_female">
                Female
            </label>
        </div>
    </div>
    <div class="mb-3 form-group">
        <label for="office_name" class="form-label">Office Name</label>
        <input name="office_name" type="text" class="form-control" id="name">
    </div>
    <div class="mb-3 form-group">
        <label for="office_email" class="form-label">Office Email</label>
        <input name="office_email" type="email" class="form-control" id="email">
    </div>
    <div class="mb-3 form-group">
        <label for="office_telephone" class="form-label">Office Telephone</label>
        <input name="office_telephone" type="number" class="form-control" id="hp">
    </div>
    <div class="mb-3 form-group">
        <label for="office_address" class="form-label">Office Address</label>
        <textarea name="office_address" class="form-control" id="office_address"></textarea>
    </div>
    <div class="row">
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection