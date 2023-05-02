<?php

namespace App\Http\Controllers\Scryfall;

use App\Models\Scryfall\Client\ApiClient;
use App\Models\Scryfall\Models\Card;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CardController extends BaseScryfallController
{
    // TODO: check for pagination
    public function index()
    {

    }

    public function show()
    {

    }

    public function autocomplete()
    {
        dd('autocomplete');

    }

}
