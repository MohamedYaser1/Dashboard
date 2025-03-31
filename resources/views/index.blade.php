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

            @if ($errors->any())
            <div class="alert alert-danger w-25 container p-1 d-flex justify-content-center mt-4">
                <ul class="mb-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
            @foreach ($categories as $category)
            @if ($post->category_id == $category-> id && $category->active == "Yes" && $post->active == 'Yes')

            <div class="post">
                <img src="post_img/{{ $post->img }}" style="width: 200px;" alt="">
                <h3 class="mt-4">{{$post->title}}</h3>
                <p>{{$post->details}}</p>

                <div class="d-flex justify-content-start">
                    <p class="p-1 border border-0 rounded-2 bg-success-subtle mb-2">
                        Created By:
                        <?php $foreignId = $post->user_id ?>
                        @foreach ($users as $userinfo)
                        @if ($userinfo->id == $foreignId)
                        {{ $userinfo->name }}
                        @endif
                        @endforeach
                    </p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="p-1 border border-0 rounded-2 bg-success-subtle mb-2">
                        Category:
                        <?php $foreignId = $post->category_id ?>
                        @foreach ($categories as $categoryinfo)
                        @if ($categoryinfo->id == $foreignId)
                        {{ $categoryinfo->name }}
                        @endif
                        @endforeach
                    </p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="p-1 border border-0 rounded-2 bg-success-subtle mb-2">
                        <?php $foreignId = $post->country_id ?>
                        @foreach ($countries as $countryinfo)
                        @if ($countryinfo->id == $foreignId)
                        {{ $countryinfo->name }}:
                        @endif

                        @endforeach
                        <?php $foreignId = $post->city_id ?>
                        @foreach ($cities as $cityinfo)
                        @if ($cityinfo->id == $foreignId)
                        {{ $cityinfo->name }}
                        @endif
                        @endforeach
                    </p>
                </div>

                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
            </div>
            <hr>

            @endif
            @endforeach
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