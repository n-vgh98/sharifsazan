<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    // relation with user for notification
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }
}
