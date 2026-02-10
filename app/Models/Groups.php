<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $guarded = [];

    public function groupsUsers() {
        return $this->hasMany(GroupsUsers::class);
    }

    public function messages() {
        return $this->hasMany(Messages::class, 'group_id')
            ->where('is_group_messages', '1');
    }
}
