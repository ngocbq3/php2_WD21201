<?php

namespace App\Models;

use PDO;

class BaseModel extends DB
{
    protected $table;
    protected $primaryKey = 'id';

    //Lấy tất cả dữ liệu của 1 bảng
    public static function  all()
    {
        $model = new static;
        $sql = "SELECT * FROM $model->table";
        //Chuẩn bị
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    //Lấy ra 1 bản ghi
    public static function find($id)
    {
        $model = new static;
        $sql = "SELECT * FROM $model->table WHERE $model->primaryKey=:$model->primaryKey";
        //Chuẩn bị
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(["$model->primaryKey" => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result[0] ?? [];
    }
}
