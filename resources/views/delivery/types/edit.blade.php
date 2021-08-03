@extends('layout.layout')
@section('title', 'Delivery Type Edit')
@section('body')

<div class="row">
    <div class="col-6">
        <h2>Delivery Type Data</h2>
    </div>
</div>
<form action="/delivery-type/{{$editData->id}}/edit" method="post">
    {{ csrf_field() }}
    <div class="mb-3 form-group">
        <label for="typeName" class="form-label">Type Name</label>
        <input name="name" type="text" class="form-control" id="typeName" value="{{$editData->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>

@endsection