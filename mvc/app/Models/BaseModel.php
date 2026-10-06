<?php

namespace App\Models;

use PDO;

class BaseModel extends DB
{
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = []; //mảng tên trường của bảng

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

    //Phương thức thêm mới dữ liệu
    public static function create($data)
    {
        $model = new static;

        //Chuyển mảng dữ liệu của fillable sang chuỗi
        $fields = implode(', ', $model->fillable);
        $values = ':' . implode(', :', $model->fillable);

        //Ghép vào câu lệnh SQL INSERT
        $sql = "INSERT INTO $model->table($fields) VALUES($values)";

        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);

        return $model->conn->lastInsertId(); //trả về id mới thêm
    }

    //Phương thức cập nhật dữ liệu
    public static function update($id, $data)
    {
        $model = new static;

        //khai báo mảng chưa dữ liệu placeholder
        $sets = [];
        foreach ($model->fillable as $field) {
            $sets[] = "$field = :$field";
        }
        //Chuyển mảng sets thành chuỗi
        $sqlSet = implode(', ', $sets);

        //Câu lệnh SQL UPDATE
        $sql = "UPDATE $model->table SET $sqlSet WHERE $model->primaryKey=:$model->primaryKey";

        $stmt = $model->conn->prepare($sql);
        $data["$model->primaryKey"] = $id;

        return $stmt->execute($data);
    }

    //Xóa dữ liệu theo id
    public static function delete($id)
    {
        $model = new static;
        $sql = "DELETE FROM $model->table WHERE $model->primaryKey=:$model->primaryKey";

        $stmt = $model->conn->prepare($sql);

        return $stmt->execute(["$model->primaryKey" => $id]);
    }
}
