<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $table = "article_categories";

    // relation between articles and categories
    public function articles()
    {
        return $this->hasMany("App\Models\Article", "category_id");
    }
    public function language()
    {
        return $this->morphone("App\Models\Lang", "langable");
    }
}
