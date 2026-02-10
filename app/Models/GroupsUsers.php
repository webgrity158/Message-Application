<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupsUsers extends Model
{
    protected $guarded = [];

    public function group() {
        return $this->belongsTo(Groups::class);
    }
}
