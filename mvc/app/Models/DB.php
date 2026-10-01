<?php

namespace App\Models;

use PDO;
use PDOException;

class DB
{
    protected $conn = null;
    public function __construct()
    {
        try {
            $dns = "mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=utf8; port=" . PORT;
            $this->conn = new PDO($dns, USERNAME, PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new \Exception('Kết nối dữ liệu thất bại: ' . $e->getMessage());
        }
    }
}
