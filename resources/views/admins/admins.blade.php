@extends('layout.main')

@section('title')
Admins
@endsection

@section('admins')
active
@endsection

@section('body')


<div class="container mt-5 d-flex justify-content-center" style="width: 200px;">
    <a href="{{ route('admins.create') }}" class="btn btn-success" style="width: 200px;">Add admin</a>
</div>


<!-- Table to Display cities -->
<div class="container" style="margin-top: 40px;">

    <table class=" table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($admins as $admin)
            @if ($admin->usertype == '1')
            <tr>
                <td>
                    <p class="fw-bold mb-1">{{ $admin->name }}</p>
                </td>

                <td>
                    <p class=" mb-1">{{ $admin->username }}</p>
                </td>


                <td>
                    <p class=" mb-1">{{ $admin->email_address }}</p>
                </td>

                <td>

                    <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">Edit</a>

                    <form method="post" style="display: inline;" action="{{route('admins.destroy', $admin->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                </td>
            </tr>
            @endif
            @endforeach


        </tbody>
    </table>
</div>


@endsection