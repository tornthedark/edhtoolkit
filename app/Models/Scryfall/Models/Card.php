<?php

namespace App\Models\Scryfall\Models;

use App\Models\Scryfall\Models\Card\CardFaceObject;
use App\Models\Scryfall\Models\Card\CoreField;
use App\Models\Scryfall\Models\Card\GameplayField;
use App\Models\Scryfall\Models\Card\PrintField;
use App\Models\Scryfall\Models\Card\RelatedCardObject;
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

    protected $hidden = [
       'id',
       'created_at',
       'updated_at'
    ];

    public function getFieldsAttribute($value)
    {
        $fields = [];
        $core_fields = $this->core_fields()->first()->toArray();

        return array_merge($fields, $core_fields);
   }

    public function core_fields(): HasOne
    {
        return $this->hasOne(CoreField::class, 'scryfall_id', 'scryfall_id');
    }

    public function gameplay_fields(): HasOne
    {
        return $this->hasOne(GameplayField::class, 'scryfall_id', 'scryfall_id');
    }

    public function print_fields(): HasOne
    {
        return $this->hasOne(PrintField::class, 'scryfall_id', 'scryfall_id');
    }

    public function cardface_objects()
    {
        return $this->hasOne(CardFaceObject::class, 'scryfall_id', 'scryfall_id');
    }

    public function related_card_objects()
    {
        return $this->hasOne(RelatedCardObject::class, 'scryfall_id', 'scryfall_id');
    }
}
