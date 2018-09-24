<?php

namespace App\Http\Controllers;
use App\Article;
use App\Comment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, array(
           'comment' => 'required|max:2000',
        ));

        $article = Article::find($id_article);

        $comment = new Comment();
        $comment->comment_author = $request->comment_author;
        $comment->comment_email = $request->comment_email;
        $comment->comment = $request->comment;
        $comment->comment_published = 1;
        $comment->user_id = $request->user_id;
        $comment->article()->associate($article);

        $comment->save();

        return redirect()->route('article', [$article->slug])->with('success', 'Комментарий добавлен успешно!!!');
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
    public function destroy($id)
    {
        //
    }
}
