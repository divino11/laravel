<?php

namespace App\Http\Controllers;

use App\Category;
use App\Article;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    public function allArticles()
    {
        return view('blog.all', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category' => $category,
            'articles' => $category->articles()->where('published', 1)->paginate(12)
        ]);
    }

    public function article($slug)
    {
        return view('blog.article', [
            'article' => Article::where('slug', $slug)->first(),
        ]);
    }

    public function likeCtr($article_id)
    {
        return view('blog.all', [
            'likeCtr' => Like::where(['article_id' => $article_id])->get()
        ]);
    }

    public function like($article_id)
    {
        $loggedIn_user = Auth::user()->id;
        $like_user = Like::where(['user_id' => $loggedIn_user, 'article_id' => $article_id])->first();
        if (empty($like_user->user->id)) {
            $user_id = Auth::user()->id;
            $id = $article_id;
            $like = new Like();
            $like->user_id = $user_id;
            $like->article_id = $id;
            $like->save();
            return redirect('/blog/all');
        } else {
            return redirect('/blog/all');
        }
    }
}
