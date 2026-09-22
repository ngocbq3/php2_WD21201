<?php

class Person
{
    public $name;
    public $age;

    //Hàm __construct là hàm khởi tạo, sẽ tự động chạy khi tạo đối tượng
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function an()
    {
        echo $this->name . " đang ăn<br>";
    }
    public function lamViec()
    {
        echo $this->name . " đang làm việc chăm chỉ <br>";
    }
}

$person1 = new Person("Nam", 23);

$person1->an();
$person1->lamViec();
