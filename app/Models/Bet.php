<?php

namespace App\Models;

use App\Enums\BetEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bet extends Model
{
    /** @use HasFactory<\Database\Factories\BetFactory> */
    use HasFactory;

    protected $casts = [
        'bet_status' => BetEnum::class,
    ];


    public function fixture (): BelongsTo {
        return $this->belongsTo(Fixture::class);
    }
}
