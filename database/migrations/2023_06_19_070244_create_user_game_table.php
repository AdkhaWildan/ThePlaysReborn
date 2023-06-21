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
        Schema::create('usergame', function (Blueprint $table) {
            // $table->id('userid');
            // $table->id('gameid');
            $table->foreignId('userid')->references('id')->on('users');
            $table->foreignId('gameid')->references('gameid')->on('games');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_game');
    }
};