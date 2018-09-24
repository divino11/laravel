@extends('layouts.app')

@section('title', "MY BLOG")

@section('content')

    <div class="container">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-sm-4 allArticles">
                    <a href="{{route('article', $article->slug)}}"><img src="/uploads/{{$article->image}}" class="blog_articles" alt=""></a>
                    <h2><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                    <p class="author_time">{{date('F nS, Y - H:i', strtotime($article->updated_at))}}</p>
                    <p>{!!$article->description_short!!}</p>
                    @include('layouts.badges')
                </div>
            @endforeach
        </div>
    </div>

@endsection
