@extends('layout.main')
@section('title')
Categories
@endsection

@section('categories')
active
@endsection

@section(section: 'body')


<!-- Form to Add Category -->
<div class="container mt-5" style="width: 647px;">
    <form method="POST" action="{{route('categories.store')}}" class="row align-items-center">

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
        <div class="col-auto">
            <input type="text" name="name" id="TextInput" class="form-control" placeholder="Enter Category Name"
                value="">
        </div>

        <!-- <div class="form-check col-auto">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="select"
                {{ old('select') == 1 ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleCheck1">Active</label>
        </div> -->

        <div class="form-check col-auto">
            <input type="radio" name="active" value="1">
            Active
            <input type="radio" name="active" value="0">
            Not Active
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success" style="width:200px">Create Category</button>
        </div>
    </form>

</div>


<!-- Table to Display Categories -->
<div class="container" style="margin-top: 40px;">
    <!-- <div class="d-flex justify-content-center my-4">
        <a href="{{ route('categories.create') }}" class="btn btn-success" style="width:120px">Create</a>
    </div> -->

    <table class=" table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Active</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
            <tr>
                <td>

                    <div>
                        <p class="fw-bold mb-1">{{ $category->name }}</p>
                    </div>

                </td>
                <td>
                    <p class="fw-normal mb-1">@if ($category->active == '1') {{ 'Yes' }} @else {{ 'No' }} @endif</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{$category->created_at->format('M-d-Y')}}</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{$category->updated_at->format('M-d-Y')}}</p>
                </td>

                <td>
                    <a href="{{ route('categories.show', $category->id)}}" class="btn btn-info">Show</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                    <form method="post" style="display: inline;"
                        action="{{route('categories.destroy', $category->id)}}">
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