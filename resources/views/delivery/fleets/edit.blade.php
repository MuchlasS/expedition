@extends('layout.layout')
@section('title', 'Delivery Fleet Edit')
@section('body')

<div class="row">
    <div class="col-6">
        <h2>Delivery Fleet Data</h2>
    </div>
</div>
<form action="/delivery-fleet/{{$editData['editData'][0]->id}}/edit" method="post">
    {{ csrf_field() }}
    <div class="mb-3 form-group">
        <label for="fleetName" class="form-label">Fleet Name</label>
        <input name="name" type="text" class="form-control" id="fleetName" value="{{$editData['editData'][0]->name}}">
    </div>
    <div class="mb-3 form-group">
        <label for="fleetsType" class="form-label">Delivery Type</label>
        <select name="delivery_type_id" class="form-select" aria-label="Delivery Types">
            @foreach($editData['paramsDeliveryType'] as $params)
            <option value="{{$params->id}}" {{$editData['editData'][0]->delivery_type_id == $params->id ? 'selected' : ''}}>
                {{$params->name}}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>

@endsection