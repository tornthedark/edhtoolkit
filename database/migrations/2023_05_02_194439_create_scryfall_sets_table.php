<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScryfallSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scryfall_sets', function (Blueprint $table) {
            $table->id();
            $table->uuid('scryfall_id');
            $table->string('code')->index()->nullable();
            $table->string('name')->nullable();
            $table->date('released_at');
            $table->integer('card_count')->default(0);
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('scryfall_sets');
    }
}
