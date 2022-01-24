<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
    public function galleries()
    {
        return $this->hasMany("App\Models\ProjectGallery","project_id");
    }
    public function images()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }
}
