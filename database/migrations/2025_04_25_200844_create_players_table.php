<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();                           // auto-increment primary key
            $table->uuid('uuid')->unique();        // our unique ID we send back
            $table->string('name');                // player name
            $table->string('email')->unique();     // player email
            $table->string('type');                // “facebook”, “google”, “guest”, etc.
            $table->timestamps();                  // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
}
