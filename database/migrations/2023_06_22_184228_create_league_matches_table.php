<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('league_matches', function (Blueprint $table) {
            $table->id();
            $table->string('team1');
            $table->string('team2');
            $table->string('winner');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('league_matches');
    }
}
