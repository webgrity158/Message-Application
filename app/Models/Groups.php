<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Groups extends Model
{
    protected $guarded = [];

    public function groupsUsers(): HasMany
    {
        return $this->hasMany(GroupsUsers::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'groups_users', 'group_id', 'user_id')
            ->withTimestamps();
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function inboxes(): HasMany
    {
        return $this->hasMany(Inbox::class, 'group_id');
    }

    public function messages(): HasManyThrough
    {
        return $this->hasManyThrough(
            Messages::class,
            Inbox::class,
            'group_id',
            'inbox_id',
            'id',
            'id'
        );
    }
}
