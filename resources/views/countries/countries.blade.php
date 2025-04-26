@extends('layout.main')

@section('title')
Countries
@endsection

@section('countries')
active
@endsection

@section('body')


<div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('countries.destroy')}}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Country</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="country_delete_id" id="country_id">
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


<!-- Form to Add Country -->
<div class="container mt-5" style="width: 647px;">

    @if (session('success'))
    <div class="alert alert-success container w-50 mt-2 d-flex justify-content-center mt-4 mb-2">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger w-50">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{route('countries.store')}}" class="row align-items-center">

        @csrf
        <div class="row justify-content-center">
            <div class="col-auto">
                <input type="text" name="name" id="TextInput" class="form-control" placeholder="Enter Country Name"
                    value="">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-success" style="width:200px">Add Country</button>
            </div>
        </div>

    </form>

</div>



<!-- Table to Display countries -->
<div class="container" style="margin-top: 40px;">
    <!-- <div class="d-flex justify-content-center my-4">
        <a href="{{ route('categories.create') }}" class="btn btn-success" style="width:120px">Create</a>
    </div> -->

    <table class=" table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($countries as $country)
            <tr>
                <td>
                    <p class="fw-bold mb-1">{{ $country->name }}</p>
                </td>

                <td>
                    <p class="fw-normal mb-1">{{$country->created_at->format('M-d-Y')}}</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{$country->updated_at->format('M-d-Y')}}</p>
                </td>

                <td>
                    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary">Edit</a>

                    <!-- <form method="post" style="display: inline;" action="{{route('countries.destroy', $country->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> -->
                    <button type="button" class="btn btn-danger delete" value="{{ $country->id }}">Delete</button>



                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>


<script>
$(document).ready(function() {
    $('.delete').click(function(x) {
        x.preventDefault();

        var country_id = $(this).val();
        $('#country_id').val(country_id);

        $('#deleteModel').modal('show');
    });
})
</script>


@endsection