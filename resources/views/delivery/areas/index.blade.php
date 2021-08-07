@extends('layout.layout')
@section('title', 'Delivery Area List')
@section('body')

<!-- ALERT SUCCESS ADD DELIVERY FLEET -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- ADD DELIVERY FLEET MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Data Delivery Fleets</h2>
    </div>
    <div class="col-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deliveryArea">
            Add Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deliveryArea" tabindex="-1" aria-labelledby="deliveryAreaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deliveryAreaLabel">Add Data Delivery Area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <form action="/delivery-area" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="deliveryAreasName" class="form-label">Delivery Area Name</label>
                            <input name="name" type="text" class="form-control" id="deliveryAreasName" placeholder="SUMATERA">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="deliveryAreaProvince" class="form-label">Province</label>
                            <select class="form-control" aria-label="Default select example" name="province_id" id="province">
                                <option value="">-= Pilih Provinsi =-</option>
                                @foreach($data as $key => $provinces)
                                <option value="{{$key}}">{{$provinces}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="deliveryAreaCity" class="form-label">City</label>
                            <select class="form-control" aria-label="Default select example" name="city_id" id="city" disabled>
                                <option value="">-= Pilih Kabupaten/Kota =-</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="deliveryAreaDistrict" class="form-label">District</label>
                            <select class="form-control" aria-label="Default select example" name="district_id" id="district" disabled>
                                <option value="">-= Pilih Kecamatan =-</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="deliveryAreaVillage" class="form-label">Village</label>
                            <select class="form-control" aria-label="Default select example" name="village_id" id="village" disabled>
                                <option value="">-= Pilih Kelurahan =-</option>
                            </select>
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

<script>
    $(function () {
        $('#province').on('change', function () {
            axios.post('{{ route('delivery-area.get-cities') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#city').empty();

                    $.each(response.data, function (id, name) {
                        $('#city').append(new Option(name, id))
                    })
                    $('#city').removeAttr('disabled')
                }).catch(function (error){
                    console.error(error)
                });
        });

        $('#city').on('change', function () {
            axios.post('{{ route('delivery-area.get-districts') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#district').empty();

                    $.each(response.data, function (id, name) {
                        $('#district').append(new Option(name, id))
                    })
                    $('#district').removeAttr('disabled')
                }).catch(function (error){
                    console.error(error)
                });
        });

        $('#district').on('change', function () {
            axios.post('{{ route('delivery-area.get-villages') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#village').empty();

                    $.each(response.data, function (id, name) {
                        $('#village').append(new Option(name, id))
                    })
                    $('#village').removeAttr('disabled')
                }).catch(function (error){
                    console.error(error)
                });
        });
    });
</script>
@endsection