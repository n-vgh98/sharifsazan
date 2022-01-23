<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexSlider extends Model
{
    use HasFactory;

    // polymorphic relation to image table
    public function detail()
    {
        return $this->morphOne("App\Models\Image", "imageable");
    }

    // polymorphic relation to lang table
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
