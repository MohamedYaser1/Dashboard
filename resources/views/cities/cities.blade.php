@extends('layout.main')

@section('title')
Cities
@endsection

@section('cities')
active
@endsection

@section('body')


<div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('cities.destroy')}}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete City</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="city_delete_id" id="city_id">
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





<!-- Form to Add City -->
<div class="container mt-5" style="width: 680px;">

    @if (session('success'))
    <div class="alert alert-success container w-50 mt-2 d-flex justify-content-center mt-4 mb-2">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{route('cities.store')}}" class="row align-items-center">

        @csrf
        <div class="col-auto">
            <input type="text" name="name" id="TextInput" class="form-control" placeholder="Enter City Name"
                value="{{ old('name') }}">
        </div>

        <div class="col-auto">

            <select class="form-select" style="width: 200px;" aria-label="Default select example" name="select">
                <option selected value="null">Select One</option>
                @foreach ($country as $countryinfo)
                <option value="{{ $countryinfo->id }}">{{ $countryinfo->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-success" style="width:200px">Add City</button>
        </div>
    </form>

</div>



<!-- Table to Display cities -->
<div class="container" style="margin-top: 40px;">
    <!-- <div class="d-flex justify-content-center my-4">
        <a href="{{ route('categories.create') }}" class="btn btn-success" style="width:120px">Create</a>
    </div> -->

    <table class=" table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Country</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cities as $city)
            <tr>
                <td>
                    <p class="fw-bold mb-1">{{ $city->name }}</p>
                </td>

                <td>
                    <p class="mb-1">
                        <?php $foreignId = $city->country_id ?>
                        @foreach ($country as $countryinfo)
                        @if ($countryinfo->id == $foreignId)
                        {{ $countryinfo->name }}
                        @endif
                        @endforeach
                    </p>
                </td>

                <td>
                    <p class="fw-normal mb-1">{{$city->created_at->format('M-d-Y')}}</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{$city->updated_at->format('M-d-Y')}}</p>
                </td>

                <td>
                    <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-primary">Edit</a>

                    <!-- <form method="post" style="display: inline;" action="{{route('cities.destroy', $city->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> -->

                    <button type="button" class="btn btn-danger delete" value="{{ $city->id }}">Delete</button>


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

        var city_id = $(this).val();
        $('#city_id').val(city_id);

        $('#deleteModel').modal('show');
    });
})
</script>

@endsection