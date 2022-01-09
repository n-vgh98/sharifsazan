<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InviteCategory extends Model
{
    use HasFactory;
    public function pages()
    {
        return $this->hasMany("App\Models\InvitePage", "category_id");
    }
    public function language()
    {
        return $this->morphone("App\Models\Lang", "langable");
    }
}
