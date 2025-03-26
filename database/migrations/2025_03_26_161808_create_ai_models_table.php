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
        Schema::create("ai_models", function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId("fixture_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->json("predicted_outcome");
            $table->decimal("confidence", 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("ai_models");
    }
};
