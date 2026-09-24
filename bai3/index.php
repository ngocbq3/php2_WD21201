<?php

require_once __DIR__ . "/vendor/autoload.php";

use Controller\ProductController;


$model = new Model\Product;

$controller = new ProductController;

$model->create();
echo "<br>";
$controller->index();

echo "<br>";

//Phân tích đường dẫn website
$url = $_SERVER['REQUEST_URI'];

$arr = explode('/', $url);
print_r($arr);

echo $arr[count($arr) - 1];
