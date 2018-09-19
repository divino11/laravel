@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_description', $article->meta_description)
@section('meta_keyword', $article->meta_keyword)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{$article->image}}" alt="">
                <h1>{{$article->title}}</h1>
                <p>{!!$article->description!!}</p>
            </div>
        </div>

        @foreach($article->comments as $comment)
            <div class="comment">
                <p><strong>Имя:</strong> {{$comment->comment_author}}</p>
                <p>{{$comment->comment}}</p>
            </div>
        @endforeach

        <form class="form-horizontal" action="{{route('comments.store', $article->id)}}" method="post" id="comments">

            {{ csrf_field() }}

            {{-- Form include --}}

            @include('blog.partials.form')

        </form>
    </div>
@endsection