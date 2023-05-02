<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScryfallCardCoreFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scryfall_card_core_fields', function (Blueprint $table) {
            $table->id();
            $table->integer('arena_id')->nullable();
            $table->uuid('scryfall_id')->index();
            $table->string('lang')->nullable();
            $table->integer('mtgo_id')->nullable();
            $table->integer('mtgo_foil_id')->nullable();
            $table->json('multiverse_ids')->nullable();
            $table->integer('tcgplayer_id')->nullable();
            $table->integer('tcgplayer_etched_id')->nullable();
            $table->integer('cardmarket_id')->nullable();
            $table->uuid('oracle_id')->nullable();
            $table->string('prints_search_uri')->nullable();
            $table->string('rulings_uri')->nullable();
            $table->string('scryfall_uri')->nullable();
            $table->string('uri')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scryfall_card_core_fields');
    }
}
