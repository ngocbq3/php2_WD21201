<?php

class Animal
{
    private $name;
    protected $age;
    public $color;

    public function __construct($name, $age, $color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }

    public function getName()
    {
        return $this->name;
    }

    public function an()
    {
        echo $this->name . " Đang ăn <br>";
    }

    public function chay()
    {
        echo $this->name . " Đang chạy <br>";
    }

    public function thongTin()
    {
        echo "Name: {$this->name} <br>";
        echo "Age: {$this->age} <br>";
        echo "Color: {$this->color} <br>";
    }
}
