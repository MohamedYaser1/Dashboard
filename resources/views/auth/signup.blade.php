@extends('layout.main')

@section('title')
Register
@endsection


@section('body')

<div class="container mt-5">
    <h3 class="fw-blod">Sign Up To Account</h3>
    <form action="{{ route('signup') }}" method="POST">

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


        <div class="col-4 mt-3">
            <div class="mt-2">
                <label for="">Name:</label>
                <input type="text" name="name" class="form-control mt-2" placeholder="Enter Name" {{ old('name') }}>
            </div>

            <div class="mt-3">
                <label for="">Email Address:</label>
                <input type="text" name="email_address" class="form-control mt-2" placeholder="Enter Email Address"
                    {{ old('email_address') }}>
            </div>

            <div class="mt-3">
                <label for="">Username:</label>
                <input type="text" name="username" class="form-control mt-2" placeholder="Enter Username"
                    {{ old('username') }}>
            </div>

            <div class="mt-3">
                <label for="">Password:</label>
                <input type="text" name="password" class="form-control mt-2" placeholder="Enter Password">
            </div>

            <div class="mt-3">
                <label for="">Confirm Password:</label>
                <input type="text" name="password_confirmation" class="form-control mt-2"
                    placeholder="Confirm Password">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success" style="width:250px">SignUp</button>
            </div>
        </div>



    </form>
</div>

@endsection