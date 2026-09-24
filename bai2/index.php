<?php

require_once "TpBank.php";
require_once "ABBank.php";


$tpBank1 = new TpBank("Nguyễn Văn Long", "longnv", "011231222", 12000000);
$tpBank1->rutTien(1000000);
$tpBank1->thongTinTaiKhoan();

$abbbank1 = new ABBank("An", 'annv', '0321310930', 90000000);
$abbbank1->napTien(100000000);
$abbbank1->thongTinTaiKhoan();

$abbbank1->chuyenTien($tpBank1, 20000000);
echo "<hr>";
$tpBank1->thongTinTaiKhoan();
