<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("teams", function (Blueprint $table) {
            $table->id()->primary();
            $table->string("name");
            $table->foreignId("sport_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->json("players")->nullable();
            $table->json("stats");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("teams");
    }
};
