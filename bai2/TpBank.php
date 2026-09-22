<?php
require_once "AbstractBank.php";
class TpBank extends AbstractBank
{
    public function __construct($name, $account, $numberAcc, $money)
    {
        $this->setName($name);
        $this->account = $account;
        $this->numberAcc = $numberAcc;
        $this->money = $money;
    }

    #[Override]
    public function rutTien($sotien)
    {
        if ($this->money >= $sotien) {
            $this->money -= $sotien;
        } else {
            echo "Số tiền trong tài khoản không đủ để rút!";
        }
    }

    #[Override]
    public function napTien($sotien)
    {
        if ($sotien > 0) {
            $this->money += $sotien;
        } else {
            echo "Số tiền không đủ để nạp vào tài khoản!";
        }
    }

    #[Override]
    public function thongTinTaiKhoan()
    {
        echo "Tên khách hàng: {$this->getName()} <br />";
        echo "Tài khoản: {$this->account} <br />";
        echo "Số tài khoản: {$this->numberAcc} <br />";
        echo "Số dư: " . number_format($this->money) . " vnđ <br />";
    }
}
