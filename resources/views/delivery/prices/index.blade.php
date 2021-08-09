@extends('layout.layout')
@section('title', 'Delivery Price List')
@section('body')

<!-- ALERT SUCCESS ADD DELIVERY PRICE -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- ADD DELIVERY PRICE MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Data Delivery Prices</h2>
    </div>
    <div class="col-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deliveryPrice">
            Add Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deliveryPrice" tabindex="-1" aria-labelledby="deliveryPriceLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deliveryPriceLabel">Add Data Delivery Price</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <form action="/delivery-price" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="deliveryArea" class="form-label">Delivery Area</label>
                            <select class="form-control" aria-label="Default select example" name="delivery_area_id" id="delivery_area">
                                <option value="">-= Pilih Area =-</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="deliveryFleet" class="form-label">Delivery Fleet</label>
                            <select class="form-control" aria-label="Default select example" name="delivery_fleet_id" id="delivery_fleet">
                                <option value="">-= Pilih Kendaraan =-</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="deliveryPricesEstimationDay" class="form-label">Delivery Price Estimation Day</label>
                            <div class="input-group">
                                <input name="estimation_day" type="text" class="form-control" id="deliveryPricesEstimationDay" placeholder="3-5">
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
                                <input type="number" class="form-control" name="price_per_kg" id="deliveryPricePerKg" placeholder="10000">
                                <input type="hidden" class="form-control" name="slug_area" id="deliveryPriceSlugArea" value="">
                                <input type="hidden" class="form-control" name="slug_fleet" id="deliveryPriceSlugFleet" value="">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DATA DELIVERY PRICE -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Delivery Area</th>
            <th scope="col">Delivery Fleet</th>
            <th scope="col">Estimation Days</th>
            <th scope="col">Price per Kg</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($deliveryPricesData as $deliveryPrice)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                {{ $deliveryPrice->deliveryArea->area->name }}
                - {{ $deliveryPrice->deliveryArea->province->name }}
                - {{ $deliveryPrice->deliveryArea->city->name }}
                - {{ $deliveryPrice->deliveryArea->district->name }}
                - {{ $deliveryPrice->deliveryArea->village->name }}
            </td>
            <td>{{ $deliveryPrice->deliveryFleet->name }} - {{ $deliveryPrice->deliveryFleet->deliveryType->name }}</td>
            <td>{{ $deliveryPrice->estimation_day }} Days</td>
            <td>Rp {{ $deliveryPrice->price_per_kg }}.00</td>
            <td>
                <a class="badge bg-warning btn" href="/delivery-price/{{ $deliveryPrice->id }}/edit">Edit</a>
                <a class="badge bg-danger btn" href="/delivery-price/{{ $deliveryPrice->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    function joinUnderscore(str){
        var text = str.split(' - ')[0].toLowerCase()
        return text
    }
    $(function(){
        axios.post('{{ route('get-areas') }}', {})
            .then(function(response){
                $('#delivery_area').empty();
                console.log(response.data)

                $.each(response.data, function(id, name){
                    $('#delivery_area').append(new Option(
                        `${name.area_name} - ${name.province_name} - ${name.city_name} - ${name.district_name} - ${name.village_name}`,
                        name.id
                    ))
                    var slugName = (name.area_name).toLowerCase().split(' ').join('_')
                })
                $('#delivery_area').change()
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
                })
                $('#delivery_fleet').change()
            }).catch(function(error){
                console.error(error)
            })

        $('#delivery_area').on('change', function(){
            var slugName = joinUnderscore($(this).text())
            $('#deliveryPriceSlugArea').val(slugName).change()
        })

        $('#delivery_fleet').on('change', function(){
            var slugName = joinUnderscore($(this).text())
            $('#deliveryPriceSlugFleet').val(slugName).change()
        })
    })
</script>

@endsection