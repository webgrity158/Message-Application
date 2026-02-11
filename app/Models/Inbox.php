<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inbox extends Model
{
    protected $guarded = [];

    public function inboxUsers(): HasMany
    {
        return $this->hasMany(InboxUser::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'inbox_users', 'inbox_id', 'user_id')
            ->withTimestamps();
    }

    public function latestMessage(): BelongsTo
    {
        return $this->belongsTo(Messages::class, 'message_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Messages::class, 'inbox_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }
}
