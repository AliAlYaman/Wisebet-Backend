<?php

namespace App\Models;

use App\Enums\SportsEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{
    /** @use HasFactory<\Database\Factories\SportFactory> */
    use HasFactory;


    protected $casts = [
        "name" => SportsEnum::class
    ];



    public function competitions() : HasMany {
        return $this->hasMany(Competition::class);
    }
    public function teams() : HasMany {
        return $this->hasMany(Team::class);
    }
}
