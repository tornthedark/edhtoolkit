<?php

namespace App\Http\Controllers\Scryfall;

use App\Models\Scryfall\Transformers\SetTransformer;

class SetController extends BaseScryfallController
{
    // TODO: add query parameter to include cards for each set
    public function index()
    {
        $response = $this->client->get('/sets');

        if($response->successful()) {
            $body = json_decode($response->body(), true);

            $sets = [];

            foreach($body['data'] as $item) {
                $sets[] = SetTransformer::transform($item);
            }

            return response($sets, 200);
        } else {
            return response(['message' => $response->clientError()], 500);
        }
    }

    public function show($id)
    {
        $response = $this->client->get("/sets/$id");

        if($response->successful()) {
            $body = json_decode($response->body(), true);

            $set = SetTransformer::transform($body);

            return response($set, 200);
        } else {
            return response(['message' => $response->clientError()], 500);
        }
    }
}
