<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function category(){
        
        return $this->belongsTo("App\Models\ServiceCategory");
    }

    public function images()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
