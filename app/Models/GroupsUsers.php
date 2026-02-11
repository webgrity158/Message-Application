<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupsUsers extends Model
{
    protected $guarded = [];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Groups::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
