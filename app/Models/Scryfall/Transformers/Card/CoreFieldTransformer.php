<?php

namespace App\Models\Scryfall\Transformers\Card;

use App\Models\Scryfall\Models\Card\CoreField;

class CoreFieldTransformer
{
    public static function transform(array $item)
    {
        return new CoreField([
            'arena_id'              => data_get($item, 'arena_id'),
            'scryfall_id'           => data_get($item, 'id'),
            'lang'                  => data_get($item, 'lang'),
            'mtgo_id'               => data_get($item, 'mtgo_id'),
            'mtgo_foil_id'          => data_get($item, 'mtgo_foil_id'),
            'multiverse_ids'        => json_encode(data_get($item, 'multiverse_ids', [])),
            'tcgplayer_id'          => data_get($item, 'tcgplayer_id'),
            'tcgplayer_etched_id'   => data_get($item, 'tcgplayer_etched_id'),
            'cardmarket_id'         => data_get($item, 'cardmarket_id'),
            'oracle_id'             => data_get($item, 'oracle_id'),
            'prints_search_uri'     => data_get($item, 'prints_search_uri'),
            'rulings_uri'           => data_get($item, 'rulings_uri'),
            'scryfall_uri'          => data_get($item, 'scryfall_uri'),
            'uri'                   => data_get($item, 'uri'),
        ]);
    }
}
