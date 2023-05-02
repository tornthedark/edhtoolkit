<?php

namespace App\Http\Controllers\Scryfall;

use App\Http\Controllers\Controller;
use App\Models\Scryfall\Client\ApiClient;

class BaseScryfallController extends Controller
{
    /** @var ApiClient $client */
    protected $client;

    public function __construct()
    {
        $this->client = new ApiClient();
    }
}
