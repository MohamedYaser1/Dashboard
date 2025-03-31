@extends('layout.main')

@section('title')
Add Admin
@endsection

@section('admins')
active
@endsection

@section('body')


<!-- Form to Add City -->
<div class="container mt-5" style="width: 580px;">
    <form method="POST" action="{{route('admins.store')}}" class="">

        <h2 class="text-center">Create Admin</h2>

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

            </div>



            <div class="col-5 g-3 align-items-center">

                <div class="row mt-3" style="width: 300px;">
                    <input type="text" name="name" id="TextInput" class="form-control" placeholder="Enter Name"
                        value="">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="text" name="username" id="TextInput" class="form-control" placeholder="Enter username"
                        value="">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="text" name="password" id="TextInput" class="form-control" placeholder="Enter Password"
                        value="">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="text" name="password_confirmation" id="TextInput" class="form-control"
                        placeholder="Confirm Password" value="">
                </div>

                <div class="row mt-2" style="width: 300px;">
                    <input type="text" name="email" id="TextInput" class="form-control"
                        placeholder="Enter Email Address" value="">
                </div>

            </div>
        </div>

        <div class="row mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-success" style="width:250px">Add Admin</button>
        </div>

    </form>

</div>

@endsection