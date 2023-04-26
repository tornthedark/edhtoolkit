<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deckbuilder_id');
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->unsignedBigInteger('deck_id')->nullable();
            $table->timestamps();

            $table->foreign('deckbuilder_id')->references('id')->on('deckbuilders');
            $table->foreign('collection_id')->references('id')->on('collections');
            $table->foreign('deck_id')->references('id')->on('decks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
