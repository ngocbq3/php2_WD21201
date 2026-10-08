<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::getAllCategery();
        return $this->view('admin.articles.index', compact('articles'));
    }
}
