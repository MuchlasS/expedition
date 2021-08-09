@extends('layout.layout')
@section('title', 'Areas List')
@section('body')

<!-- ALERT SUCCESS ADD AREAS -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- ADD AREAS MODAL -->
<div class="row">
    <div class="col-12">
        <h2>Data Areas</h2>
    </div>
    <div class="col-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#areasModel">
            Add Data
        </button>
        <!-- Modal -->
        <div class="modal fade" id="areasModel" tabindex="-1" aria-labelledby="areasModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="areasModelLabel">Add Area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <form action="/area" method="POST">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label for="areasName" class="form-label">Area Name</label>
                            <input name="name" type="text" class="form-control" id="areasName" placeholder="JAWA">
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
<!-- DATA AREAS -->
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($areasData as $area)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $area->name }}</td>
            <td>
                <a class="badge bg-warning btn" href="/area/{{ $area->id }}/edit">Edit</a>
                <a class="badge bg-danger btn" href="/area/{{ $area->id }}/delete">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection