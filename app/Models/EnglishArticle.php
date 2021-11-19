<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishArticle extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo("App\Models\EnglishArticleCategory", "category_id");
    }

    // polymorphic relation to image table
    public function images()
    {
        return $this->morphMany("App\Models\Image", "imageable");
    }
}
