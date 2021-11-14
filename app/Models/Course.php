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
        return $this->morphToMany("App\Models\Image", "imageable");
    }
}
