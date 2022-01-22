<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageDecoration extends Model
{
    use HasFactory;
    public function image()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }

    // polymorphic relation to lang table
    public function lang()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
