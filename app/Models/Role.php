<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // relations

    // relation with user for user roles
    public function users()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }
}
