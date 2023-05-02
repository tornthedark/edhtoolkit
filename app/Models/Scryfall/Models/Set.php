<?php

namespace App\Models\Scryfall\Models;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    protected $table = 'scryfall_sets';

    protected $fillable = [
        'scryfall_id',
        'code',
        'name',
        'released_at',
        'card_count',
        'icon',
    ];

}
