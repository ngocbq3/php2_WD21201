<?php
// Require composer autoloader
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
    echo "Home Page";
});

$router->get('/test', 'App\Controllers\TestController@index');

//404 not found
$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    echo "404 Not Found";
});

// Run it!
$router->run();
