<?php

namespace App\Models;

class Article extends BaseModel
{
    protected $table = "news";
    protected $fillable = [
        'title',
        'image',
        'description',
        'content',
        'category_id'
    ];

    //Phương thức lấy ra toàn bộ dữ liệu bảng news và tên category
    public static function getAllCategery(){
        $model = new static;
        $sql = "SELECT n.*, name FROM news n JOIN categories c ON n.category_id=c.id";
        //Chuẩn bị
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS);
        return $result;
    }
}
