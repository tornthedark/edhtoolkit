<?php

namespace App\Models\Scryfall\Transformers;

use App\Models\Scryfall\Models\Card;

class CardTransformer
{
    public static function transform(array $item)
    {
        return new Card([
            'scryfall_id' => data_get($item, 'id'),
            'oracle_id'   => data_get($item, 'oracle_id'),
            'name'        => data_get($item, 'name')
        ]);
    }
}
