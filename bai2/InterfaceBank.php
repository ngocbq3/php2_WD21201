<?php

interface InterfaceBank
{
    public function rutTien($tien);
    public function napTien($tien);
    public function thongTinTaiKhoan();
    public function chuyenTien($acc, $sotien);
}
