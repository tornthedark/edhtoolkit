<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deck extends Model
{
    use HasFactory;

    protected $fillable = ['deckbuilder_id', 'collection_id'];

    public function deckbuilder(): BelongsTo
    {
        $this->belongsTo(Deckbuilder::class);
    }

    public function collection()
    {
        $this->belongsTo(Collection::class);
    }

    public function cards(): HasMany
    {
        $this->hasMany(Card::class);
    }
}
