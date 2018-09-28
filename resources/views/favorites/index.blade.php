@extends('layouts.app')

@section('title', "MY BLOG")

@section('content')

    <div class="container">
        <div class="row">
                @foreach($allArticlesFromFavorite as $favorite)
                    <div class="col-sm-4 allArticles">
                        {{$favorite->article_id}}
                    </div>
                @endforeach
        </div>
    </div>

@endsection
