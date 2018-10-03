@extends('layouts.app')

@section('title', "MY BLOG")

@section('content')

    <div class="container">
        <div class="row">
            @foreach($allArticlesFromFavorite as $favorite)
                @if($favorite->user_id == \Illuminate\Support\Facades\Auth::user()->id)
                    <?php $articles = \App\Article::where('id', $favorite->article_id)->get(); ?>
                    @foreach($articles as $article)
                        <div class="col-sm-12 allArticles">
                            @if (!empty($article->image))
                                <div class="col-sm-4">
                                    <a href="{{route('article', $article->slug)}}"><img
                                                src="/uploads/{{$article->image}}"
                                                class="blog_articles" alt=""></a>
                                </div>
                            @endif
                            <div class="@if(!empty($article->image))col-sm-5 @else col-sm-9 @endif">
                                <div class="article_body">
                                    <h2><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
                                    <p class="author_time">{{date('F nS, Y - H:i', strtotime($article->updated_at))}}</p>
                                    <p>{!!$article->description_short!!}</p>
                                    <div class="footer_badges">
                                        @include('layouts.badges')
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>

@endsection
