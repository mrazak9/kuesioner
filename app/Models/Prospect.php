<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Prospect extends Model
{
    use HasFactory, SoftDeletes, Userstamps;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'school',
        'address',
        'city',
        'route',
        'id_registrant',
        'is_iput_form',
        'is_pay_form',
        'is_test',
        'is_pay_regist',
    ];

    /**
     * Get the Trans that owns the Prospect
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}
