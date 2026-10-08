<?php
// Require composer autoloader

use App\Controllers\Admin\ArticleController;
use App\Controllers\TestController;
use App\Models\Article;

require_once __DIR__ . "/env.php";
require __DIR__ . '/vendor/autoload.php';


// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->get('about', function () {
    echo "About Page";
});
$router->get("contact", function () {
    echo "Contact Page";
});
$router->get("/", function () {
    //Test thêm mới
    $data = [
        'title' => 'Iphone 18 vừa ra mắt update',
        'image' => '',
        'description' => 'Iphone 18 pro',
        'content' => 'Iphone 18 pro dùng bộ nhớ của trung quốc',
        'category_id' => 3
    ];

    var_dump(Article::update(5, $data));
});

$router->get('/test', TestController::class . '@index');


//Admin
$router->get('admin/articles', ArticleController::class . '@index');
$router->get('/admin/articles/create', ArticleController::class . "@create");
$router->post('/admin/articles/create', ArticleController::class . "@store");

$router->get('/admin/articles/edit/{id}', ArticleController::class . '@edit');
$router->post('/admin/articles/edit/{id}', ArticleController::class . '@edit');

//404 not found
$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    echo "404 Not Found";
});

// Run it!
$router->run();
