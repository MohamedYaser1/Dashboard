@extends('layout.main')

@section('title')
Register
@endsection


@section('body')
<div class="d-flex justify-content-center">
    <div class="mt-5 w-25 bg-success-subtle text-success-emphasis rounded-4 p-4">
        <h3 class="fw-blod text-center">Admin Register</h3>
        <form action="{{ route('signup') }}" method="POST">

            @if ($errors->any())
            <div class="alert alert-danger container p-1 d-flex justify-content-center mt-4">
                <ul class="mb-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @csrf


            <div class=" mt-3">
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
                    <input type="password" name="password" class="form-control mt-2" placeholder="Enter Password">
                </div>

                <div class="mt-3">
                    <label for="">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control mt-2"
                        placeholder="Confirm Password">
                </div>
                <div class="mt-3">
                    <input type="hidden" name="usertype" class="form-control mt-2" value="1">
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success" style="width:150px">SignUp</button>
                </div>
            </div>



        </form>
    </div>
</div>
@endsection