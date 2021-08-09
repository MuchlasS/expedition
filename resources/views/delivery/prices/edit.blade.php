@extends('layout.layout')
@section('title', 'Delivery Price Edit')
@section('body')

<div class="row">
    <div class="col-12">
        <h2>Edit Data Delivery Prices</h2>
    </div>
    <div class="col-12">
    <form action="/delivery-price/{{$editData->id}}/edit" method="POST">
        {{ csrf_field() }}
            <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="deliveryArea" class="form-label">Delivery Area</label>
                    <select class="form-control" aria-label="Default select example" name="delivery_area_id" id="delivery_area" disabled>
                        <option value="">-= Pilih Area =-</option>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="deliveryFleet" class="form-label">Delivery Fleet</label>
                    <select class="form-control" aria-label="Default select example" name="delivery_fleet_id" id="delivery_fleet" disabled>
                        <option value="">-= Pilih Kendaraan =-</option>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3 form-group">
                    <label for="deliveryPricesEstimationDay" class="form-label">Delivery Price Estimation Day</label>
                    <div class="input-group">
                        <input name="estimation_day" type="text" class="form-control" id="deliveryPricesEstimationDay" value="{{$editData->estimation_day}}">
                        <div class="input-group-append">
                            <span class="input-group-text">Days</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="mb-3 form-group">
                <label for="deliveryPricePerKg" class="form-label">Delivery Price Per KG</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" class="form-control" name="price_per_kg" id="deliveryPricePerKg" value="{{$editData->price_per_kg}}">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</form>
<script>
    $(function(){
        var editData = @json($editData);
        axios.post('{{ route('get-delivery-areas') }}', {})
            .then(function(response){
                $('#delivery_area').empty();
                console.log(response.data)

                $.each(response.data, function(id, name){
                    $('#delivery_area').append(new Option(
                        `${name.area_name} - ${name.province_name} - ${name.city_name} - ${name.district_name} - ${name.village_name}`,
                        name.id
                    ))
                    $(`#delivery_area option[value=${editData.delivery_area_id}]`).attr('selected', 'selected')
                })
            }).catch(function(error){
                console.error(error)
            })
        
        axios.post('{{ route('get-fleets') }}', {})
            .then(function(response){
                console.log(response.data)
                $('#delivery_fleet').empty();

                $.each(response.data, function(id, name){
                    $('#delivery_fleet').append(new Option(
                        `${name.name} - ${name.delivery_type_name}`,
                        name.id
                    ))
                    $(`#delivery_fleet option[value=${editData.delivery_fleet_id}]`).attr('selected', 'selected')
                })
            }).catch(function(error){
                console.error(error)
            })
    })
</script>
@endsection