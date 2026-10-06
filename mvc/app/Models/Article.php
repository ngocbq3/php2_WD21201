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
}
