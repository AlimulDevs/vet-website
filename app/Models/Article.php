<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'image_url',
        'category_article_id'


    ];

    public function category_article()
    {
        return $this->belongsTo(CategoryArticle::class);
    }
}
