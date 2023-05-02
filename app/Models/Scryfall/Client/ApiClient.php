<?php

namespace App\Models\Scryfall\Client;

use Illuminate\Support\Facades\Http;

class ApiClient
{
    protected $base_uri = "https://api.scryfall.com";

    protected $options = [
        'verify' => false
    ];

    public function __construct()
    {

    }

    public function post($endpoint, $body)
    {
        $url = $this->base_uri.$endpoint;

        $response = Http::withOptions($this->options)
            ->withBody($body, 'application/json')
            ->post($url);

        return $response;
    }

    public function get($endpoint, $query = [])
    {
        $url = $this->base_uri.$endpoint;

        $response = Http::withOptions($this->options)
            ->get($url, $query);

        return $response;
    }
}
