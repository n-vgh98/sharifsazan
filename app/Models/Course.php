<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // polymorphic relation to image table
    public function images()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }
    public function language()
    {
        return $this->morphone("App\Models\Lang", "langable");
    }

    public function comments()
    {
        return $this->morphone("App\Models\Comment", "commentable");
    }
}
