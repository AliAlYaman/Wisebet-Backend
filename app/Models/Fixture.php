<?php

namespace App\Models;

use App\Enums\FixtureEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fixture extends Model
{
    /** @use HasFactory<\Database\Factories\FixtureFactory> */
    use HasFactory;

    protected $casts = [
        "status" => FixtureEnum::class
    ];

    public function bets() : HasMany {
        return $this->hasMany(Bet::class);
    }

    public function prediction() : HasOne {
        return $this->hasOne(Bet::class);
    }
}
