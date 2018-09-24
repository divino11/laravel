<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard() {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5),
            'articles' => Article::lastArticles(5),
            'comments' => Comment::lastComments(5),
            'count_categories' => Category::count(),
            'count_articles' => Article::count(),
            'count_comments' => Comment::count(),
        ]);
    }
}
