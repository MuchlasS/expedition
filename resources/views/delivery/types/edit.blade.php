@extends('layout.layout')
@section('title', 'Delivery Type Edit')
@section('body')

<div class="row">
    <div class="col-12">
        <h2>Edit Data Delivery Types</h2>
    </div>
    <div class="col-12">
        <form action="/delivery-type/{{$editData->id}}/edit" method="POST">
        {{ csrf_field() }}
            <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="deliveryTypesName" class="form-label">Delivery Type Name</label>
                    <input name="name" type="text" class="form-control" id="deliveryTypesName" value="{{ $editData->name }}">
                </div>
            </div>
            <div class="modal-footer">
                <a href="/delivery-type" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</form>

@endsection