@extends('layout.main')
@section('title')
Update Countries
@endsection

@section('body')


<div class="container mt-3 w-25">

    <form method="POST" action="{{route('countries.update', $country->id)}}" class="">

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
                value="{{ $country->name }}">
        </div>

        <button type="submit" class="btn btn-primary w-100">Add</button>
    </form>

</div>


@endsection