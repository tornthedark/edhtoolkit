<?php

namespace App\Models\Scryfall\Transformers;

use App\Models\Scryfall\Models\Set;
use Carbon\Carbon;

class SetTransformer
{
    public static function transform($item)
    {
        return new Set([
            'scryfall_id'   => data_get($item, 'id'),
            'code'          => data_get($item, 'code'),
            'name'          => data_get($item, 'name'),
            'released_at'   => Carbon::parse(data_get($item, 'released_at')),
            'card_count'    => data_get($item, 'card_count'),
            'icon'          => data_get($item, 'icon_svg_uri')
        ]);
    }

}
