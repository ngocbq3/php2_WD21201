<?php

abstract class AbstractBank
{
    private $name;
    public $account;
    public $numberAcc;
    public $money;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public abstract function rutTien($sotien);
    public abstract function napTien($sotien);
    public abstract function thongTinTaiKhoan();
}
