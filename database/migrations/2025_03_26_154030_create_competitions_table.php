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
        Schema::create("competitions", function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId("sport_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->string("name");
            $table->string("country");
            $table->string("logo");
            $table->boolean("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("competitions");
    }
};
