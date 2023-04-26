<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['deckbuilder_id'];

    public function deckbuilder(): BelongsTo
    {
        $this->belongsTo(Deckbuilder::class);
    }
}
