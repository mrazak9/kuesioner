<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prospect_id',
        'status',
        'period',
        'route',
    ];

    public function Prospect(): BelongsTo
    {
        return $this->belongsTo(Camp::class);
    }
}
