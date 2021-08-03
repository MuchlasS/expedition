@extends('layout.layout')
@section('title', 'Login Form')
@section('body')

<div class="row">
    <div class="col-6">
        <h2>Login Form</h2>
    </div>
</div>
<form action="/login" method="post">
    {{ csrf_field() }}
    <div class="mb-3 form-group">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="email" class="form-control" id="email">
    </div>
    <div class="mb-3 form-group">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <div class="row">
        <div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="/register" class="btn btn-secondary">Register</a>
        </div>
    </div>
</form>

@endsection