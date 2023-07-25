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
        Schema::create('club_matches', function (Blueprint $table) {
            $table->foreignId('home_club_id')->constrained('clubs');
            $table->foreignId('away_club_id')->constrained('clubs');
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_matches');
    }
};
