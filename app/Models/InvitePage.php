<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitePage extends Model
{
    use HasFactory;
    protected $table = "invite_pages";

    public function category()
    {
        return $this->belongsTo("App\Models\InviteCategory", "category_id");
    }
}
