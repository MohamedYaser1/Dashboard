@extends('layout.main')

@section('title')
Post
@endsection


@section('body')
<div class="container mt-5">

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-auto w-75">
                    <h2>{{$post->title}}</h2>
                    <p class="fs-5">{{$post->details}}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">Edit</a>
                    <form method="post" style="display: inline;" action="{{route('posts.destroy', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
                <div class="col-auto">
                    <img src="{{url('post_img/'.$post->img)}}" style="width: 180px;" alt="">
                </div>
            </div>

        </div>

        <div class="col-md-1"></div>
        <div class="col-md-3">
            <h3>sidebar</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae asperiores ea, aperiam quia id error,
                animi amet magnam harum obcaecati reprehenderit quo fugiat optio eveniet corrupti quae, illum facere
                provident.</p>

        </div>
    </div>
</div>
@endsection