<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarsiArticle extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo("App\Models\ArticleCategory", "category_id");
    }
}