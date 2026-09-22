<?php

require_once "Animal.php";

require_once "Cat.php";

$animal1 = new Animal('Cậu Vàng', 12, 'Vàng');

echo $animal1->color;

$tom = new Cat("Tom", 60, "Tam thể");

$tom->chay();
$tom->thongTin();

$animal1->an();
$tom->an();
