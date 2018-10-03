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
        <?php $id = ''; ?>
        @foreach($article->favorite as &$favorite)
            <?php $id = $favorite->user_id; ?>
        @endforeach
        @if($id != Auth::id())
            <form action="{{route('favorite.store', $article->id)}}">
                <button @if(!Auth::check()) disabled @endif class="badges"><i class="fa fa-star-o"
                                                                              aria-hidden="true"></i></button>
            </form>
        @else
            <form action="{{route('favorite.destroy', $article->id)}}">
                <button @if(!Auth::check()) disabled @endif class="badges"><i class="fa fa-star" aria-hidden="true"></i>
                </button>
            </form>
        @endif
    </div>
    <div class="col-sm-4">
        {{--@foreach($article->like as &$like)@endforeach
        @if(empty($like->user_id))
            <form action="{{route('like.store', $article->id)}}">
                <button @if(!Auth::check()) disabled @endif class="badges"><i class="fa fa-heart-o"
                                                                              aria-hidden="true"></i> @if($article->like->count() != 0) {{$article->like->count()}} @endif
                </button>
            </form>
        @else
            <form action="{{route('like.destroy', $article->id)}}">
                <button @if(!Auth::check()) disabled @endif  class="badges"><i class="fa fa-heart"
                                                                               aria-hidden="true"></i> @if($article->like->count() != 0) {{$article->like->count()}} @endif
                </button>
            </form>
        @endif--}}
        <?php $id = ''; ?>
        @foreach($article->like as &$like)
            <?php $id = $like->user_id; ?>
        @endforeach
        @if($id != Auth::id())
            <form action="{{route('like.store', $article->id)}}">
                <button @if(!Auth::check()) disabled @endif class="badges"><i class="fa fa-heart-o"
                                                                              aria-hidden="true"></i> @if($article->like->count() != 0) {{$article->like->count()}} @endif
                </button>
            </form>
        @else
            <form action="{{route('like.destroy', $article->id)}}">
                <button @if(!Auth::check()) disabled @endif  class="badges"><i class="fa fa-heart"
                                                                               aria-hidden="true"></i> @if($article->like->count() != 0) {{$article->like->count()}} @endif
                </button>
            </form>
        @endif
    </div>
</div>