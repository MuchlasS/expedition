@extends('layout.layout')
@section('title', 'Delivery Fleet Edit')
@section('body')

<div class="row">
    <div class="col-12">
        <h2>Edit Data Delivery Fleets</h2>
    </div>
    <div class="col-12">
    <form action="/delivery-area/{{$editData['main']->id}}/edit" method="POST">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="deliveryAreasName" class="form-label">Delivery Area Name</label>
                        <select class="form-control" aria-label="Default select example" name="area_id" id="area">
                            <option value="">-= Pilih Area =-</option>
                            @foreach($editData['areas'] as $key => $area)
                            <option value="{{$key}}" {{ $key == $editData['main']->area->id ? 'selected' : '' }} >{{$area}}</option>
                            @endforeach
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
                        <select class="form-control" aria-label="Default select example" name="city_id" id="city">
                            <option value="">-= Pilih Kabupaten/Kota =-</option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="deliveryAreaDistrict" class="form-label">District</label>
                        <select class="form-control" aria-label="Default select example" name="district_id" id="district">
                            <option value="">-= Pilih Kelurahan =-</option>
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="deliveryAreaVillage" class="form-label">Village</label>
                        <select class="form-control" aria-label="Default select example" name="village_id" id="village">
                            <option value="">-= Pilih Kecamatan =-</option>
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
</form>
<script>
    $(function () {
        var editData = @json($editData['main']);
        console.log(editData)
        axios.post('{{ route('get-provinces') }}', {})
            .then(function (response){
                $('#province').empty();

                $.each(response.data, function (id, name){
                    $('#province').append(new Option(name, id));
                    $(`#province option[value=${editData.province_id}]`).attr('selected', 'selected');
                })
            }).catch(function (error){
                console.error(error)
            });

        axios.post('{{ route('get-cities') }}', {id: editData.province_id})
            .then(function (response){
                $('#city').empty();

                $.each(response.data, function (id, name){
                    $('#city').append(new Option(name, id));
                    $(`#city option[value=${editData.city_id}]`).attr('selected', 'selected');
                })
            }).catch(function (error){
                console.error(error)
            });

        axios.post('{{ route('get-districts') }}', {id: editData.city_id})
            .then(function (response){
                $('#district').empty();

                $.each(response.data, function (id, name){
                    $('#district').append(new Option(name, id));
                    $(`#district option[value=${editData.district_id}]`).attr('selected', 'selected');
                })
            }).catch(function (error){
                console.error(error)
            });

        axios.post('{{ route('get-villages') }}', {id: editData.district_id})
            .then(function (response){
                $('#village').empty();

                $.each(response.data, function (id, name){
                    $('#village').append(new Option(name, id));
                    $(`#village option[value=${editData.village_id}]`).attr('selected', 'selected');
                })
            }).catch(function (error){
                console.error(error)
            });

        $('#province').on('change', function () {
            axios.post('{{ route('get-cities') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#city').empty()
                    $('#district').empty().append(new Option('-= Pilih Kecamatan =-'))
                    $('#village').empty().append(new Option('-= Pilih Kelurahan =-'))

                    $.each(response.data, function (id, name) {
                        $('#city').append(new Option(name, id))
                    })
                    $('#city').removeAttr('disabled')

                    console.log(response)
                }).catch(function (error){
                    console.error(error)
                });
        });

        $('#city').on('change', function () {
            axios.post('{{ route('get-districts') }}', {id: $(this).val()})
                .then(function (response) {
                    $('#district').empty();
                    $('#village').empty().append(new Option('-= Pilih Kelurahan =-'))

                    $.each(response.data, function (id, name) {
                        $('#district').append(new Option(name, id))
                    })
                    $('#district').removeAttr('disabled')
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