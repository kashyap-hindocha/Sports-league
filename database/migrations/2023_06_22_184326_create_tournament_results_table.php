<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentResultsTable extends Migration
{
    public function up()
    {
        Schema::create('tournament_results', function (Blueprint $table) {
            $table->id();
            $table->string('stage');
            $table->string('team1');
            $table->string('team2');
            $table->string('winner');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tournament_results');
    }
}
