@extends('layout.main')

@section('title')
Add Post
@endsection

@section('posts')
active
@endsection

@section('body')


<!-- Form to Add City -->
<div class="container mt-5" style="width: 580px;">
    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">

        <h2 class="text-center">Create Post</h2>

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
                    <label for="" class="form-label">Posted By</label>
                </div>

                <div class="col-auto mt-3">
                    <label for="" class="form-label">Active</label>
                </div>

            </div>



            <div class="col-5 g-3 align-items-center">

                <div class="row mt-3" style="width: 300px;">
                    <input type="text" name="title" id="TextInput" class="form-control" placeholder="Enter Title"
                        value="{{ old('title') }}">
                </div>

                <div class="row my-2" style="width: 300px;">
                    <textarea class="form-control" name="details" id="exampleFormControlTextarea1"
                        rows="3">{{ old("details") }}</textarea>
                </div>

                <div class="row my-3" style="width: 300px;">
                    <input type="file" name="img">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <select class="form-select" style="width: 200px;" aria-label="Default select example"
                        name="select_category">
                        <option value="">Select Category</option>
                        @foreach ($categories as $categoryinfo)
                        <option value="{{ $categoryinfo->id }}">{{ $categoryinfo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-2">
                    <select class="form-select" id="country-dropdown" style="width: 200px;"
                        aria-label="Default select example" name="select_country">
                        <option value="">Select Country</option>
                        @foreach ($countries as $countryinfo)
                        <option value="{{ $countryinfo->id }}">{{ $countryinfo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-2">
                    <select class="form-select" name="select_city" id="city-dropdown" style="width: 200px;">
                    </select>
                </div>

                <div class="row mt-2">
                    <select class="form-select" name="posted_by" style="width: 200px;">
                        <option value="">Select User</option>
                        @foreach ($users as $user)
                        @if ($user->usertype == '0')
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>


                <div class=" col-auto mt-3">
                    <input type="radio" name="active" value="1">
                    Active
                    <input type="radio" name="active" value="0">
                    Not Active
                </div>

            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-success" style="width:250px">Add Post</button>
        </div>

    </form>





</div>

<script>
$(document).ready(function() {

    $('#country-dropdown').on('change', function() {
        var country_id = this.value;
        $("#city-dropdown").html('');
        $.ajax({
            url: "{{url('get-cities-by-country')}}",
            type: "POST",
            data: {
                country_id: country_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#city-dropdown').html('<option value="">Select City</option>');
                $.each(result.cities, function(key, value) {
                    $("#city-dropdown").append('<option value="' + value.id +
                        '">' + value.name + '</option>');
                });
            }
        });


    });

});
</script>

@endsection