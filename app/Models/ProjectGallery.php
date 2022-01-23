<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    use HasFactory;
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
    public function project()
    {
        return $this->belongsTo("App\Models\Project","project_id");
    }
}
