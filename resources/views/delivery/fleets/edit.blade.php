@extends('layout.layout')
@section('title', 'Delivery Fleet Edit')
@section('body')

<div class="row">
    <div class="col-12">
        <h2>Edit Data Delivery Fleets</h2>
    </div>
    <div class="col-12">
    <form action="/delivery-fleet/{{$editData['fleets']->id}}/edit" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="deliveryFleetsName" class="form-label">Delivery Fleet Name</label>
                            <input name="name" type="text" class="form-control" id="deliveryFleetsName" value="{{$editData['fleets']->name}}">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="deliveryFleetsName" class="form-label">Delivery Fleet Type</label>
                            <select class="form-control" aria-label="Default select example" name="delivery_type_id" id="deliveryType">
                                @foreach($editData['types'] as $type)
                                <option value="{{$type->id}}" {{$type->id === $editData['fleets']->delivery_type_id ? 'selected' : ''}}>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/delivery-fleet" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
    </div>
</div>
</form>

@endsection