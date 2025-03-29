@extends('layout.main')

@section('title')
Countries
@endsection

@section('countries')
active
@endsection

@section('body')

<!-- Form to Add Country -->
<div class="container mt-5" style="width: 647px;">
    <form method="POST" action="{{route('countries.store')}}" class="row align-items-center">

        @if ($errors->any())
        <div class="alert alert-danger w-50">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @csrf
        <div class="row">
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

                    <form method="post" style="display: inline;" action="{{route('countries.destroy', $country->id)}}">
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