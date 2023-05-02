<?php

namespace App\Http\Controllers\Scryfall;

use App\Models\Scryfall\Client\ApiClient;
use App\Models\Scryfall\Models\Card;
use App\Models\Scryfall\Transformers\Card\CoreFieldTransformer;
use App\Models\Scryfall\Transformers\CardTransformer;
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

    public function show($multiverse_id)
    {
        $response = $this->client->get("/cards/multiverse/$multiverse_id", [
            'pretty' => true
        ]);

        if($response->successful()) {
            $body = json_decode($response->body(), true);
            $scryfall_id = data_get($body, 'id');
            $card = Card::where('scryfall_id', $scryfall_id)->with(['core_fields'])->first();

            if(!$card) {
                try {
                    $card = CardTransformer::transform($body);
                    $card->save();

                    if(!$card->core_fields()->where('scryfall_id', $scryfall_id)->first()) {
                        $card->core_fields()->save(CoreFieldTransformer::transform($body));
                    }

                    $card = Card::where('scryfall_id', $scryfall_id)->with(['core_fields'])->first();

                } catch (\Exception $e) {
                    report($e);
                }
            }

            return response($card, 200);
        } else {
            return response(['message' => $response->reason()], 500);
        }
    }

}
