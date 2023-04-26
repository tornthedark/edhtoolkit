<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deckbuilder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];


    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function collections(): HasMany
    {
        $this->hasMany(Collection::class);
    }
}
