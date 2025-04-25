@extends('layout.main')

@section('title')
Login
@endsection


@section('body')

<div class="d-flex justify-content-center">
    <div class="mt-5 w-25 bg-success-subtle text-success-emphasis rounded-4 p-4">
        <h3 class="fw-blod text-center">Login</h3>
        <form action="{{ route('login') }}" method="POST">

            @csrf

            <div class="mt-3 mb-3">
                <div class="">
                    <label for="">Username:</label>
                    <input type="text" name="username" class="form-control mt-2" placeholder="Enter Username"
                        value="{{ old('username') }}">
                    @error('username')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="">Password:</label>
                    <input type="password" name="password" class="form-control mt-2" placeholder="Enter Password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success" style="width:100px">Login</button>
                </div>

            </div>

            <!-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif -->


        </form>
    </div>
</div>
@endsection