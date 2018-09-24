@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_description', $article->meta_description)
@section('meta_keyword', $article->meta_keyword)

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{$article->image}}" alt="">
                <h1>{{$article->title}}</h1>
                <p>{!!$article->description!!}</p>
                <hr>
            </div>
        </div>
        <h3 class="comment_title"><span class="glyphicon glyphicon-comment"></span> {{$article->comments->count()}}
            комментария(ев)</h3>
        @foreach($article->comments as $comment)
            @if($comment->comment_published == 1)
                <div class="comment">
                    <div class="author_info">
                        <img src="{{'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->comment_email))) . '?s=50&d=mm'}}"
                             class="author_image" alt="">
                        <div class="author_name">
                            <h4>{{$comment->comment_author}}</h4>
                            <p class="author_time">{{date('F nS, Y - H:i', strtotime($comment->created_at))}}</p>
                        </div>
                    </div>
                    <div class="comment_content">
                        {{$comment->comment}}
                    </div>
                </div>
            @endif
        @endforeach

        <form class="form-horizontal" action="{{route('comments.store', $article->id)}}" method="post" id="comments">

            {{ csrf_field() }}

            {{-- Form include --}}

            @include('blog.partials.form')

        </form>
    </div>
@endsection