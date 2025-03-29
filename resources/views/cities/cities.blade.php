@extends('layout.main')

@section('title')
Cities
@endsection

@section('cities')
active
@endsection

@section('body')


<!-- Form to Add City -->
<div class="container mt-5" style="width: 680px;">
    <form method="POST" action="{{route('cities.store')}}" class="row align-items-center">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @csrf
        <div class="col-auto">
            <input type="text" name="name" id="TextInput" class="form-control" placeholder="Enter City Name" value="">
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

                    <form method="post" style="display: inline;" action="{{route('city.destroy', $city->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>


@endsection