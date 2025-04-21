@extends('layout.main')

@section('title')
Update User
@endsection

@section('users')
active
@endsection

@section('body')


<!-- Form to Add City -->
<div class="container mt-5" style="width: 580px;">
    <form method="POST" action="{{route('users.update', $user->id)}}" class="">

        <h2 class="text-center">Update User</h2>


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
                    <label for="" class="form-label">Name</label>
                </div>

                <div class="row-auto mt-3">
                    <label for="" class="form-label">username</label>
                </div>

                <div class="row-auto mt-3">
                    <label for="" class="form-label">Password</label>
                </div>

                <div class="row-auto mt-3">
                    <label for="" class="form-label">Confirm Password</label>
                </div>

                <div class="col-auto mt-3">
                    <label for="" class="form-label">Email Address</label>
                </div>

                <div class="col-auto mt-3">
                    <label for="" class="form-label">User Activation</label>
                </div>



                <!-- <div class="col-auto mt-3">
                    <label for="" class="form-label">Country</label>
                </div>

                <div class="col-auto mt-3">
                    <label for="" class="form-label">City</label>
                </div> -->
            </div>



            <div class="col-5 g-3 align-items-center">

                <div class="row mt-3" style="width: 300px;">
                    <input type="text" name="name" id="TextInput" class="form-control" placeholder="Enter Name"
                        value="{{ $user->name }}">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="text" name="username" id="TextInput" class="form-control" placeholder="Enter username"
                        value="{{ $user->username }}">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="password" name="password" id="TextInput" class="form-control"
                        placeholder="Enter Password" value="">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="password" name="password_confirmation" id="TextInput" class="form-control"
                        placeholder="Confirm Password" value="">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="text" name="email" id="TextInput" class="form-control"
                        placeholder="Enter Email Address" value="{{ $user->email_address }}">
                </div>

                <div class=" col-auto mt-3">
                    <input type="radio" name="active" value="Yes" @if ($user->active == '1') {{'checked'}} @endif>
                    Active
                    <input type="radio" name="active" value="No" @if ($user->active == '0') {{'checked'}} @endif>
                    Not Active
                </div>

            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-success" style="width:250px">Update User</button>
        </div>

    </form>

</div>

@endsection