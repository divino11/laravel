@extends('layouts.app')

@section('title', $category->title . " - MY BLOG")

@section('content')

    <div class="container">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-sm-12">
                    <a href="{{route('article', $article->slug)}}"><img src="{{$article->image}}" alt=""></a>
                    <h2><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                    <p>{!!$article->description_short!!}</p>
                    <div class="col-sm-4">
                        <a href="{{route('article', $article->slug)}}/#comments">
                            <i class="fa fa-comment" aria-hidden="true"></i> {{$article->comments->count()}}
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </div>
                </div>
            @empty
                <h2 class="text-center">Пусто</h2>
            @endforelse
        </div>

        {{$articles->links()}}
    </div>

@endsection