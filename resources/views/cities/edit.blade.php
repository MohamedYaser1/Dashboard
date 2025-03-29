@extends('layout.main')
@section('title')
Update Cities
@endsection

@section('body')


<div class="container mt-3 w-25">

    <form method="POST" action="{{route('cities.update', $city->id)}}" class="">

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
        <div class="mb-3">
            <label for="TextInput" class="form-label">Name </label>
            <input type="text" name="name" id="TextInput" class="form-control" placeholder="Enter name"
                value="{{ $city->name }}">
        </div>

        <div class="col-auto mb-3">

            <label for="TextInput" class="form-label">Select Country </label>

            <select class="form-select" style="width: 200px;" aria-label="Default select example" name="select">
                <option selected value="null">Select One</option>
                @foreach ($country as $countryinfo)
                <option value="{{ $countryinfo->id }}">{{ $countryinfo->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Add</button>
    </form>

</div>


@endsection