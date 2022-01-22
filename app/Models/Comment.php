<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    use HasFactory;
    public function writer()
    {
        return $this->belongsTo("App\Models\User", "writer_id");
    }

    public function answers()
    {
        return $this->hasMany("App\Models\Comment", "parent_id");
    }

    public function genesis()
    {
        return $this->belongsTo("App\Models\Comment", "parent_id");
    }

    // polymorphic relation to lang table
    public function language()
    {
        return $this->morphOne("App\Models\Lang", "langable");
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
