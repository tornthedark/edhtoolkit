<?php

namespace App\Models\Scryfall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = [
        'scryfall_id',
        'oracle_id',
        'name'
    ];



}
