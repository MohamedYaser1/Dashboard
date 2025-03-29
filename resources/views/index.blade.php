@extends('layout.main')

@section('title')
Home
@endsection

@section('home')
active
@endsection

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card"
                style="width: 100%; height: 250px; margin-bottom: 3rem; padding: 50px; background-color:rgb(207, 212, 216);">

                <div class="card-body">
                    <h2 class="card-title">Welcome</h2>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="post">
                <img src="post_img/{{ $post->img }}" style="width: 200px;" alt="">
                <h3 class="mt-4">{{$post->title}}</h3>
                <p>{{$post->details}}</p>

                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
            </div>
            <hr>
            @endforeach

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