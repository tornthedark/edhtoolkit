<?php

namespace App\Http\Controllers\Scryfall;

use App\Models\Scryfall\Models\Set;
use App\Models\Scryfall\Transformers\SetTransformer;

class SetController extends BaseScryfallController
{
    // TODO: add query parameter to include cards for each set
    public function index()
    {
        $response = $this->client->get('/sets', [
            'pretty' => 'true'
        ]);

        if($response->successful()) {
            $body = json_decode($response->body(), true);

            $sets = [];
            foreach($body['data'] as $item) {
                /** @var Set $set */
                $set = SetTransformer::transform($item);

                if(!$set->exists) {
                    try {
                        $set->save();
                    } catch (\Exception $e) {
                        report($e);
                    }
                }

                $sets[] = $set;
            }

            return response($sets, 200);
        } else {
            return response(['message' => $response->clientError()], 500);
        }
    }

    public function show($set_code)
    {
        $response = $this->client->get("/sets/$set_code", [
            'pretty' => true
        ]);

        if($response->successful()) {
            $body = json_decode($response->body(), true);

            /** @var Set $set */
            $set = SetTransformer::transform($body);

            if(!$set->exists) {
                try {
                    $set->save();
                } catch (\Exception $e) {
                    report($e);
                }
            }

            return response($set, 200);
        } else {
            return response(['message' => $response->clientError()], 500);
        }
    }
}
