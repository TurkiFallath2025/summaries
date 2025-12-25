<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Summary extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'summaries_content', 
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
