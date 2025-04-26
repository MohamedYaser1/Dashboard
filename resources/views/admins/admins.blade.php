@extends('layout.main')

@section('title')
Admins
@endsection

@section('admins')
active
@endsection

@section('body')



<div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('admins.destroy')}}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="admin_delete_id" id="admin_id">
                    <h6>Are You Sure?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success w-25 container mt-2 d-flex justify-content-center mt-4 mb-1">
    {{ session('success') }}
</div>
@endif

<div class="container mt-5 d-flex justify-content-center" style="width: 200px;">
    <a href="{{ route('admins.create') }}" class="btn btn-success" style="width: 200px;">Add Admin</a>
</div>


<!-- Table to Display cities -->
<div class="container" style="margin-top: 40px;">

    <table class=" table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($admins as $admin)
            @if ($admin->usertype == '1')
            <tr>
                <td>
                    <p class="fw-bold mb-1">{{ $admin->name }}</p>
                </td>

                <td>
                    <p class=" mb-1">{{ $admin->username }}</p>
                </td>


                <td>
                    <p class=" mb-1">{{ $admin->email_address }}</p>
                </td>

                <td>

                    <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">Edit</a>

                    <!-- <form method="post" style="display: inline;" action="{{route('admins.destroy', $admin->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> -->

                    <button type="button" class="btn btn-danger delete" value="{{ $admin->id }}">Delete</button>


                </td>
            </tr>
            @endif
            @endforeach


        </tbody>
    </table>
</div>


<script>
$(document).ready(function() {
    $('.delete').click(function(x) {
        x.preventDefault();

        var admin_id = $(this).val();
        $('#admin_id').val(admin_id);

        $('#deleteModel').modal('show');
    });
})
</script>

@endsection