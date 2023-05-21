<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
