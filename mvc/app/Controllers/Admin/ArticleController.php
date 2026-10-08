<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::getAllCategery();
        return $this->view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return $this->view('admin.articles.create', compact('categories'));
    }

    public function store()
    {
        $posts = $_POST;

        $posts['image'] = '';

        //Thêm ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $path_image = 'images/' . $file['name'];
            move_uploaded_file($file['tmp_name'], ROOT_DIR . '/' . $path_image);

            $posts['image'] = $path_image;
        }
        Article::create($posts);

        header("location: " . BASE_URL . 'admin/articles');
    }

    public function edit($id)
    {
        $post = Article::find($id);
        $categories = Category::all();

        return $this->view(
            'admin.articles.edit',
            compact('post', 'categories')
        );
    }
}
