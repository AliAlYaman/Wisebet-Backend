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
        Schema::create("bets", function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId("user_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("fixture_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->decimal("bet_amount", 15, 8);
            $table->string("bet_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("bets");
    }
};
