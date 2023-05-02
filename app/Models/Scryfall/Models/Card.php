<?php

namespace App\Models\Scryfall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Card extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = [
        'scryfall_id',
        'oracle_id',
        'name'
    ];



}
