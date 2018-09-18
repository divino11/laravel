@extends('layouts.app')

@section('title', $category->title . " - MY BLOG")

@section('content')

    <div class="container">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-sm-3">
                    <a href="{{route('article', $article->slug)}}"><img src="{{$article->image}}" alt=""></a>
                    <h2><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                    <p>{!!$article->description_short!!}</p>
                </div>
            @empty
                <h2 class="text-center">Пусто</h2>
            @endforelse
        </div>

        {{$articles->links()}}
    </div>

@endsection