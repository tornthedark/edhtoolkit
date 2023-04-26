<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'deckbuilder_id',
        'collection_id',
        'deck_id',
        'scryfall_id'
    ];

    public function deckbuilder(): BelongsTo
    {
        $this->belongsTo(Deckbuilder::class);
    }

    public function collection()
    {
        $this->belongsTo(Collection::class);
    }

    public function scryfall()
    {
        $this->belongsTo(\App\Models\Scryfall\Models\Card::class);
    }





}
