@extends('layout.main')

@section('title')
Posts
@endsection

@section('posts')
active
@endsection

@section('body')


<div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('posts.destroy')}}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="post_delete_id" id="post_id">
                    <h6>Are You Sure You Want To Delete This Post?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>


@if (session('success'))
<div class="alert alert-success w-25 container mt-2 d-flex justify-content-center mt-4 mb-1">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger w-25 container p-1 d-flex justify-content-center mt-4">
    <ul class="mb-1">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container mt-4 d-flex justify-content-center" style="width: 200px;">
    <a href="{{ route('posts.create') }}" class="btn btn-success" style="width: 200px;">Add Post</a>
</div>


<!-- Table to Display cities -->
<div class="container" style="margin-top: 40px;">

    <table class=" table align-middle mb-0 bg-white">
        <thead>

            <tr>
                <th scope="col">Title</th>
                <th scope="col">Details</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Country</th>
                <th scope="col">City</th>
                <th scope="col">Posted By</th>
                <th scope="col">Active</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th>{{$post->title}}</th>
                <td><?=  substr($post->details,0,15)?></td>
                <td><?php
                        if ($post->img != null) {
                            ?>
                    <img src="storage/post_image/<?=$post->img?>" width="100px" alt="">
                    <?php
                        } else {
                            ?>
                    <div class="error">No Image</div>
                    <?php
                        }     
                    ?>
                </td>
                <td>
                    <?php $foreignId = $post->category_id ?>
                    @foreach ($categories as $categoryinfo)
                    @if ($categoryinfo->id == $foreignId)
                    {{ $categoryinfo->name }}
                    @endif
                    @endforeach
                </td>
                <td>
                    <?php $foreignId = $post->country_id ?>
                    @foreach ($countries as $countryinfo)
                    @if ($countryinfo->id == $foreignId)
                    {{ $countryinfo->name }}
                    @endif
                    @endforeach
                </td>
                <td>
                    <?php $foreignId = $post->city_id ?>
                    @foreach ($cities as $cityinfo)
                    @if ($cityinfo->id == $foreignId)
                    {{ $cityinfo->name }}
                    @endif
                    @endforeach
                </td>
                <td>
                    <?php $foreignId = $post->user_id ?>
                    @foreach ($users as $userinfo)
                    @if ($userinfo->id == $foreignId)
                    {{ $userinfo->name }}
                    @endif
                    @endforeach
                </td>
                <td>@if ($post->active == '1') {{ 'Yes' }} @else {{ 'No' }} @endif </td>
                <td>{{$post->created_at->format('Y-m-d')}}</td>
                <td>{{$post->updated_at->format('Y-m-d')}}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>

                    <!-- <form method="post" style="display: inline;" action="{{route('posts.destroy', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> -->
                    <button type="button" class="btn btn-danger delete" value="{{ $post->id }}">Delete</button>


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

        var post_id = $(this).val();
        $('#post_id').val(post_id);

        $('#deleteModel').modal('show');
    });
})
</script>


@endsection