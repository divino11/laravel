<div class="col-md-6">
    @if (empty(Auth::user()->name))
        <p>Пожалуйста, <a href="{{ route('register') }}">зарегестрируйтесь</a> или <a href="{{ route('login') }}">войдите</a>
            чтобы оставить комментарий</p>
    @else
        <input type="hidden" name="id_article" value="{{ $article->id }}"/>
        <input type="hidden" name="comment_author" value="{{ Auth::user()->name }}"/>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>

        <label for="">Комментарий</label>
        <textarea class="form-control" name="comment" id="comment"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" value="Отправить">
    @endif
</div>