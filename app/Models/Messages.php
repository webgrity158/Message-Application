<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $guarded = [];

    public function fromUser() {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function group() {
        return $this->belongsTo(Groups::class, 'group_id');
    }
}
