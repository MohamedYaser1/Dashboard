@extends('layout.main')

@section('title')
Post
@endsection

@section('categories')
active
@endsection


@section('body')
<div class="container mt-5">

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach ($posts as $post)
                @if ($post->category_id == $category->id)

                <div class="col-auto w-75">

                    <h2>{{$post->title}}</h2>
                    <p class="fs-5">{{$post->details}}</p>

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

                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success">Edit</a>
                    <form method="post" style="display: inline;" action="{{route('posts.destroy', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>



                </div>
                <div class="col-auto">
                    <img src="{{url('post_img/'.$post->img)}}" style="width: 180px; margin-bottom: 20px;" alt="">
                </div>
                <hr>
                @endif
                @endforeach
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