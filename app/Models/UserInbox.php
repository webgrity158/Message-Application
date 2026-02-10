<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInbox extends Model
{
    protected $guarded = [];
    protected $table = 'user_inbox';

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inboxOfUser() {
        return $this->belongsTo(UserInbox::class, 'inboxof_user_id');
    }

    public function messages() {
        return $this->hasOne(Messages::class, 'id', 'message_id');
    }

    public function group() {
        return $this->belongsTo(Groups::class, 'group_id');
    }

}
