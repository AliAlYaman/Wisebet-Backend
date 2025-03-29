<?php

namespace Database\Seeders;

use App\Enums\FixtureEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            SportSeeder::class,
            CompetitionSeeder::class,
            FixtureEnum::class
        ]);
    }
}
