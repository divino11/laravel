<label for="">Статус</label>
<select name="published" class="form-control">
    @if(isset($comment->id))
        <option value="0" @if($comment->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1" @if($comment->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Автор</label>
<input type="text" class="form-control" name="comment_author" placeholder="Автор" value="{{$comment->comment_author or ""}}" required>

<label for="">Email</label>
<input type="text" class="form-control" name="comment_email" placeholder="Email" value="{{$comment->comment_email or ""}}" required>

<label for="">Комментарий</label>
<textarea class="form-control" name="comment" id="comment">{{$comment->comment or ""}}</textarea>

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">