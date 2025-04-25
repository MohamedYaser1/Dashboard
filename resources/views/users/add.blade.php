@extends('layout.main')

@section('title')
Add User
@endsection

@section('users')
active
@endsection

@section('body')


<!-- Form to Add City -->
<div class="container mt-5" style="width: 580px;">
    <form method="POST" action="{{route('users.store')}}" class="">

        <h2 class="text-center">Create User</h2>


        <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->

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

            </div>



            <div class="col-5 g-3 align-items-center">

                <div class="row mt-3" style="width: 300px;">
                    <input type="text" name="name" id="TextInput" class="form-control" placeholder="Enter Name"
                        value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="text" name="username" id="TextInput" class="form-control" placeholder="Enter username"
                        value="{{ old('username') }}">
                    @error('username')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="password" name="password" id="TextInput" class="form-control"
                        placeholder="Enter Password" value="">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="password" name="password_confirmation" id="TextInput" class="form-control"
                        placeholder="Confirm Password" value="">
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="text" name="email" id="TextInput" class="form-control"
                        placeholder="Enter Email Address" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="hidden" name="usertype" id="TextInput" class="form-control" value="0">
                </div>

                <div class=" col-auto mt-3">
                    <input type="radio" name="active" value="1">
                    Active
                    <input type="radio" name="active" value="0">
                    Not Active
                    <br>
                    @error('active')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-success" style="width:250px">Add User</button>
        </div>

    </form>

</div>

@endsection