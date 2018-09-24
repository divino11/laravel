@extends('layouts.app')

@section('title', "MY BLOG")

@section('content')

    <div class="container">
        <div class="row">
            @if($favorites[0] == Auth::user()->id)
                @foreach($allArticlesFromFavorite as $favorite)
                    <div class="col-sm-4 allArticles">
                        {{$favorite->id}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
