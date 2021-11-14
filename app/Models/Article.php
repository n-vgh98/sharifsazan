<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo("App\Models\ArticleCategory", "category_id");
    }

    // polymorphic relation to image table
    public function images()
    {
        return $this->morphToMany("App\Models\Image", "imageable");
    }
}
