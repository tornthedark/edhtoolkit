<?php

namespace App\Models\Scryfall\Models\Card;

use App\Models\Scryfall\Models\Card;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrintField extends Model
{
    use HasFactory;

    public function scryfall_card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'scryfall_id', 'scryfall_id');
    }

}
