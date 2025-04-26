@extends('layout.main')
@section('title')
Categories
@endsection

@section('categories')
active
@endsection

@section(section: 'body')


<div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('categories.destroy')}}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="category_delete_id" id="category_id">
                    <h6>Are You Sure?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- Form to Add Category -->
<div class="container mt-5" style="width: 647px;">

    @if (session('success'))
    <div class="alert alert-success w-50 container mt-2 d-flex justify-content-center mt-4 mb-3">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{route('categories.store')}}" class="row align-items-center">

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


                    <!-- <form method="post" style="display: inline;"
                        action="{{route('categories.destroy', $category->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> -->

                    <button type="button" class="btn btn-danger delete" value="{{ $category->id }}">Delete</button>


                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>


<script>
$(document).ready(function() {
    $('.delete').click(function(x) {
        x.preventDefault();

        var category_id = $(this).val();
        $('#category_id').val(category_id);

        $('#deleteModel').modal('show');
    });
})
</script>


@endsection