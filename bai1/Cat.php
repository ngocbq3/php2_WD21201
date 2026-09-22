<?php

class Cat extends Animal
{
    public function getAge()
    {
        return $this->age;
    }

    public function an()
    {
        echo $this->getName() . " đang ăn chuột <br>";
    }
}
