<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = "footer";

    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }
}
