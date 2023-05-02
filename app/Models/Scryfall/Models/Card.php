<?php

namespace App\Models\Scryfall\Models;

use App\Models\Scryfall\Models\Card\CoreField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Card extends Model
{
    use HasFactory;

    protected $table = 'scryfall_cards';

    protected $fillable = [
        'scryfall_id',
        'oracle_id',
        'name'
    ];

    public function core_fields(): HasOne
    {
        return $this->hasOne(CoreField::class, 'scryfall_id', 'scryfall_id');
    }
}
