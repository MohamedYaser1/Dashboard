@extends('layout.main')
@section('title')
Update Categories
@endsection

@section('categories')
active
@endsection

@section('body')


<div class="container mt-3 w-25">

    <form method="POST" action="{{route('categories.update', $category->id)}}" class="">

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
                value="{{ $category->name }}">
        </div>

        <div class="mb-3">
            <input <?=$category->active == "1" ? "checked" :""?> type="radio" name="active" value="1">
            Yes
            <input <?php if($category->active == "0"){echo "checked";}?> type="radio" name="active" value="0">
            No
        </div>
        <button type="submit" class="btn btn-primary w-100">Add</button>
    </form>

</div>


@endsection