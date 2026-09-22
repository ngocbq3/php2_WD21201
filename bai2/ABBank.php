<?php
require_once "InterfaceBank.php";
class ABBank implements InterfaceBank
{
    protected $name;
    protected $account;
    protected $numberAcc;
    protected $money;

    public function __construct($name, $account, $numberAcc, $money)
    {
        $this->name = $name;
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
        echo "Tên khách hàng: {$this->name} <br />";
        echo "Tài khoản: {$this->account} <br />";
        echo "Số tài khoản: {$this->numberAcc} <br />";
        echo "Số dư: " . number_format($this->money) . " vnđ <br />";
    }

    #[Override]
    public function chuyenTien($acc, $sotien)
    {
        if ($this->money >= $sotien) {
            $this->money -= $sotien;
            $acc->napTien($sotien);
            echo "Bạn đã chuyển thành công số tiên {$sotien} sang tài khoản {$acc->getName()}. Số dư là: {$this->money}";
        } else {
            echo "Số tiên trong tài khoản không đủ!";
        }
    }
}
