@extends('layout.layout')
@section('title', 'Area Edit')
@section('body')

<div class="row">
    <div class="col-6">
        <h2>Edit Area Data</h2>
    </div>
</div>
<form action="/area/{{$editData->id}}/edit" method="post">
    {{ csrf_field() }}
    <div class="mb-3 form-group">
        <label for="areasName" class="form-label">Area Name</label>
        <input name="name" type="text" class="form-control" id="areasName" value="{{$editData->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>

@endsection