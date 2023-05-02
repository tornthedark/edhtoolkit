<?php

namespace App\Models\Scryfall\Models\Card;

use App\Models\Scryfall\Models\Card;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CoreField extends Model
{
    use HasFactory;

    protected $table = 'scryfall_card_core_fields';

    protected $fillable = [
        'arena_id',
        'scryfall_id',
        'lang',
        'mtgo_id',
        'mtgo_foil_id',
        'multiverse_ids',
        'tcgplayer_id',
        'tcgplayer_etched_id',
        'cardmarket_id',
        'oracle_id',
        'prints_search_uri',
        'rulings_uri',
        'scryfall_uri',
        'uri'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function scryfall_card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'scryfall_id', 'scryfall_id');
    }

}
