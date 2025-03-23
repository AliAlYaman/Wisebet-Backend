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
        Schema::create('compeitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sport_id")->constrained("sports")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('compeitions');
    }
};
