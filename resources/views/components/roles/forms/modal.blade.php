<div>
    <!-- Button trigger modal -->
    @if($label == 'Add')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rolesModel">
        {{$label}} Data
    </button>
    @else
    <a class="badge bg-warning btn" id="editBtn" href="" data-bs-toggle="modal" data-id="{{ $urlAction }}" data-bs-target="#rolesModel">Edit</a>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="rolesModel" tabindex="-1" aria-labelledby="rolesModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rolesModelLabel">{{$label}} Data Roles</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{$urlAction}}" method="POST" id="form">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="mb-3 form-group">
                        <label for="rolesName" class="form-label">Role Name</label>
                        <input name="role_name" type="text" class="form-control" id="rolesName" value="{{$value}}" placeholder="{{$placeholder}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit">{{$btnLabel()}}</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function(){
        $(document).on('click', '#editBtn', function (event) {
            event.preventDefault();
            var url = $(this).data('id');
            console.log(url);
            $.get(url, function (data) {
                $('#rolesModelLabel').html("Edit Data Roles");
                $('#submit').val("Save changes");
                $('#rolesName').val(data.name);
            });
            $('#form').attr('action', url);
        });
    });
</script>