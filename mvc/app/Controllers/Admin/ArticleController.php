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
        //Lấy ra thông báo
        $message = $_SESSION['message'] ?? '';
        unset($_SESSION['message']); //Xóa thông báo khỏi session
        return $this->view('admin.articles.index', compact('articles', 'message'));
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

        //validator
        $errors = []; //Lưu thông tin lỗi
        if ($posts['title'] == '' || trim($posts['title']) == '') {
            $errors['title'] = "Bạn cần nhập dữ liệu";
        }

        //Thêm ảnh
        $file = $_FILES['image'];
        //Quy đinh đinh dạng ảnh được phép
        $img_ext = ['jpg', 'jpeg', 'gif'];

        if ($file['size'] > 0) {
            //Lấy định dạng file
            $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (!in_array($file_ext, $img_ext)) {
                $errors['image'] = "Bạn cần nhập đúng định dạng";
            }
        }

        //Trường hợp validate có lỗi
        if ($errors) {
            $categories = Category::all();
            return $this->view('admin.articles.create', compact('categories', 'errors', 'posts'));
        }

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

        //Nếu chúng ta gửi yêu cầu lên server là POST thì sẽ thực hiện cập nhật
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $posts = $_POST; //lấy dữ liệu của input

            $posts['image'] = $post->image; //giữ lại ảnh cũ nếu không cập nhật mới

            $file = $_FILES['image'];
            if ($file['size'] > 0) {
                $path_image = 'images/' . $file['name'];
                move_uploaded_file($file['tmp_name'], ROOT_DIR . '/' . $path_image);

                $posts['image'] = $path_image;
            }

            Article::update($id, $posts);
            //Lưu thông báo vào session
            $_SESSION['message'] = "Cập nhật dữ liệu thành công";
            return header("location: " . BASE_URL . 'admin/articles');
        }

        return $this->view(
            'admin.articles.edit',
            compact('post', 'categories')
        );
    }

    public function delete($id)
    {
        Article::delete($id);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        return header("location: " . BASE_URL . 'admin/articles');
    }
}
