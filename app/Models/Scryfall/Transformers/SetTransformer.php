<?php

namespace App\Models\Scryfall\Transformers;

class SetTransformer
{
    public static function transform($item)
    {
        return [
            'scryfall_id'   => data_get($item, 'id'),
            'name'          => data_get($item, 'name'),
            'code'          => data_get($item, 'code'),
            'icon'  => data_get($item, 'icon_svg_uri')
        ];
    }

}
