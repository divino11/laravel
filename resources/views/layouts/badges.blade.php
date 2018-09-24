<div class="badges_wrapper">
    <div class="col-sm-4">
        <a href="{{route('article', $article->slug)}}/#comments">
            @if ($article->comments->count() != 0)
                <i class="fa fa-comment" aria-hidden="true"></i> {{$article->comments->count()}}
            @else
                <i class="fa fa-comment-o" aria-hidden="true"></i>
            @endif
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{route('favorite.store', $article->id)}}" class="badges">
            @if ($article->favorite->count() != 0)
                <i class="fa fa-star" aria-hidden="true"></i>
            @else
                <i class="fa fa-star-o" aria-hidden="true"></i>
            @endif
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{route('like.store', $article->id)}}" class="badges">
            @if ($article->like->count() != 0)
                <i class="fa fa-heart" aria-hidden="true"></i>
                {{$article->like->count()}}
            @else
                <i class="fa fa-heart-o" aria-hidden="true"></i>
            @endif
        </a>
    </div>
</div>