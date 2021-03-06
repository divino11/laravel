<?php

namespace App\Http\Controllers;

use App\Article;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('favorites.index', [
            'favorites' => Favorite::where('user_id', 1)->get(),
            'allArticlesFromFavorite' => Favorite::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function favorite($user_id)
    {
        $favorite = Favorite::where('user_id', $user_id)->first();

        return view('favorites.index', [
            'favorite' => $favorite,
            'articles' => $favorite->articles()->where('published', 1)->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_article)
    {
        $article = Article::find($id_article);

        $favorite = new Favorite();
        $favorite->user_id = Auth::user()->id;
        $favorite->article()->associate($article);

        $favorite->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_article)
    {
        $favorite = Favorite::where(['article_id' => $id_article, 'user_id' => Auth::id()])->get();
        foreach ($favorite as $item) {
            $item->delete();
        }
        return back();
    }
}
