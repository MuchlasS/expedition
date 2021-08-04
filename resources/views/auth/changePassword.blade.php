@extends('layout.layout')
@section('title', 'Password Edit')
@section('body')

<div class="row">
    <div class="col-6">
        <h2>Edit Password {{$editData->name}}</h2>
    </div>
</div>
<form action="/change-password/{{$editData->id}}" method="post">
    {{ csrf_field() }}
    <div class="mb-3 form-group">
        <label for="password" class="form-label">New Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>

@endsection