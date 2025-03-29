@extends('layout.main')

@section('title')
Users
@endsection

@section('users')
active
@endsection

@section('body')

<div class="container mt-5 d-flex justify-content-center" style="width: 200px;">
    <a href="{{ route('users.create') }}" class="btn btn-success" style="width: 200px;">Add User</a>
</div>


<!-- Table to Display cities -->
<div class="container" style="margin-top: 40px;">
    <!-- <div class="d-flex justify-content-center my-4">
        <a href="{{ route('categories.create') }}" class="btn btn-success" style="width:120px">Create</a>
    </div> -->

    <table class=" table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email Address</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            <tr>
                <td>
                    <div class="">
                        <p class="fw-bold mb-1">{{ $user->name }}</p>
                    </div>
                </td>

                <td>
                    <div class="">
                        <p class=" mb-1">{{ $user->username }}</p>
                    </div>
                </td>

                <td>
                    <div class="">
                        <p class=" mb-1">{{ $user->email_address }}</p>
                    </div>
                </td>

                <td>
                    <div class="">
                        <p class=" mb-1">{{ $user->active }}</p>
                    </div>
                </td>

                <td>

                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>

                    <form method="post" style="display: inline;" action="{{route('users.destroy', $user->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>


@endsection