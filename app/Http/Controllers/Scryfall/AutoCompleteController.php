<?php

namespace App\Http\Controllers\Scryfall;

use Illuminate\Http\Request;
class AutoCompleteController extends BaseScryfallController
{
    public function cardsAutocomplete(Request $request)
    {
        $q = $request->get('q', '');

        $response = $this->client->get('/cards/autocomplete', [
            'pretty'        => true,
            'include_extra' => false,
            'q'             => $q
        ]);

        if($response->successful()) {
            $body = json_decode($response->body(), true);
            $suggestions = data_get($body, 'data', []);

            return response($suggestions, 200);
        } else {
            return response($response->reason(), $response->status());
        }
    }
}
