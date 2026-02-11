<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Messages extends Model
{
    protected $guarded = [];

    public function fromUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function inbox(): BelongsTo
    {
        return $this->belongsTo(Inbox::class, 'inbox_id');
    }

    public function referencedMessage(): BelongsTo
    {
        return $this->belongsTo(Messages::class, 'refferenced_message_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Messages::class, 'refferenced_message_id');
    }
}
