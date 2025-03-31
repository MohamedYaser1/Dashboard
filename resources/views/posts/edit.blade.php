@extends('layout.main')

@section('title')
Add User
@endsection

@section('posts')
active
@endsection

@section('body')


<!-- Form to Add City -->
<div class="container mt-5" style="width: 580px;">
    <form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">

        <h2 class="text-center">Update Post</h2>


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
        <div class="row">

            <div class="col-3 g-3">
                <div class="row mt-3">
                    <label for="" class="form-label">Title</label>
                </div>

                <div class="row-auto mt-5">
                    <label for="" class="form-label">Details</label>
                </div>

                <div class="row-auto" style="margin-top: 35px;">
                    <label for="" class="form-label">Image</label>
                </div>

                <div class="col-auto mt-3">
                    <label for="" class="form-label">Category</label>
                </div>

                <div class="col-auto mt-3">
                    <label for="" class="form-label">Country</label>
                </div>

                <div class="col-auto mt-3">
                    <label for="" class="form-label">City</label>
                </div>

                <div class="col-auto mt-3">
                    <label for="" class="form-label">Active</label>
                </div>

            </div>



            <div class="col-5 g-3 align-items-center">

                <div class="row mt-3" style="width: 300px;">
                    <input type="text" name="title" id="TextInput" class="form-control" placeholder="Enter Title"
                        value="{{ $post->title }}">
                </div>

                <div class="row my-2" style="width: 300px;">
                    <textarea class="form-control" name="details" id="exampleFormControlTextarea1"
                        rows="3">{{ $post->details }}</textarea>
                </div>

                <div class="row my-3" style="width: 300px;">
                    <input type="file" name="img">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <select class="form-select" style="width: 200px;" aria-label="Default select example"
                        name="select_category">
                        @foreach ($categories as $categoryinfo)
                        <option value="{{ $categoryinfo->id }}" @if ($post->category_id == $categoryinfo->id)
                            {{'selected'}}
                            @endif>{{ $categoryinfo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-2">
                    <select class="form-select" style="width: 200px;" aria-label="Default select example"
                        name="select_country">
                        @foreach ($countries as $countryinfo)
                        <option value="{{ $countryinfo->id }}" @if ($post->country_id == $countryinfo->id)
                            {{'selected'}}
                            @endif>{{ $countryinfo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-2">
                    <select class="form-select" style="width: 200px;" aria-label="Default select example"
                        name="select_city">
                        @foreach ($cities as $cityinfo)
                        <option value="{{ $cityinfo->id }}" @if ($post->city_id == $cityinfo->id) {{'selected'}}
                            @endif>{{ $cityinfo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class=" col-auto mt-3">
                    <input type="radio" name="active" value="Yes" @if ($post->active == 'Yes') {{'checked'}} @endif>
                    Active
                    <input type="radio" name="active" value="No" @if ($post->active == 'No') {{'checked'}} @endif>
                    Not Active
                </div>

            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-success" style="width:250px">Update Post</button>
        </div>

    </form>

</div>

@endsection