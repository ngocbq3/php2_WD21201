<?php
// Require composer autoloader

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
    var_dump(Article::find(4));
});

$router->get('/test', TestController::class . '@index');

//404 not found
$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    echo "404 Not Found";
});

// Run it!
$router->run();
