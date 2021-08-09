@extends('layout.layout')
@section('title', 'Delivery Area List')
@section('body')

<!-- ALERT SUCCESS ADD DELIVERY FLEET -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- ADD DELIVERY FLEET MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Data Delivery Areas</h2>
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
                            <select class="form-control" aria-label="Default select example" name="area_id" id="area">
                                <option value="">-= Pilih Area =-</option>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="deliveryAreaProvince" class="form-label">Province</label>
                            <select class="form-control" aria-label="Default select example" name="province_id" id="province">
                                <option value="">-= Pilih Provinsi =-</option>
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
<!-- DATA DELIVERY FLEET -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Area Name</th>
            <th scope="col">Province</th>
            <th scope="col">City</th>
            <th scope="col">District</th>
            <th scope="col">Village</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $area)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $area->area->name }}</td>
            <td>{{ $area->province->name }}</td>
            <td>{{ $area->city->name }}</td>
            <td>{{ $area->district->name }}</td>
            <td>{{ $area->village->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/delivery-area/{{ $area->id }}/edit">Edit</a>
                <a class="badge bg-danger btn" href="/delivery-area/{{ $area->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(function () {
        axios.post('{{ route('get-areas') }}', {})
            .then(function (response) {
                $('#area').empty();

                $.each(response.data, function (id, name) {
                    $('#area').append(new Option(name, id))
                })
            }).catch(function (error){
                console.error(error)
            });

        axios.post('{{ route('get-provinces') }}', {})
            .then(function (response) {
                $('#province').empty();

                $.each(response.data, function (id, name) {
                    $('#province').append(new Option(name, id))
                })
                $('#province').change()

            }).catch(function (error){
                console.error(error)
            });
            
        $('#province').on('change', function () {
            axios.post('{{ route('get-cities') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#city').empty();

                    $.each(response.data, function (id, name) {
                        $('#city').append(new Option(name, id))
                    })
                    $('#city').removeAttr('disabled')
                    $('#city').change()

                }).catch(function (error){
                    console.error(error)
                });
        });

        $('#city').on('change', function () {
            axios.post('{{ route('get-districts') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#district').empty();

                    $.each(response.data, function (id, name) {
                        $('#district').append(new Option(name, id))
                    })
                    $('#district').removeAttr('disabled')
                    $('#district').change()
                }).catch(function (error){
                    console.error(error)
                });
        });

        $('#district').on('change', function () {
            axios.post('{{ route('get-villages') }}', {id: $(this).val()})
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