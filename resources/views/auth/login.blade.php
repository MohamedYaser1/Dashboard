@extends('layout.main')

@section('title')
Login
@endsection


@section('body')

<div class="container mt-5">
    <h3 class="fw-blod">Login To Your Account</h3>
    <form action="{{ route('login') }}" method="POST">

        @csrf

        <div class="col-4 mt-3 mb-3">
            <div class="">
                <label for="">Username:</label>
                <input type="text" name="username" class="form-control mt-2" placeholder="Enter Username"
                    value="{{ old('username') }}">
            </div>

            <div class="mt-3">
                <label for="">Password:</label>
                <input type="text" name="password" class="form-control mt-2" placeholder="Enter Password">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success" style="width:100px">Login</button>
            </div>

        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


    </form>
</div>

@endsection