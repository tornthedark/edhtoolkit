<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Scryfall\SetController;
use App\Http\Controllers\Scryfall\CardController;
use App\Http\Controllers\Scryfall\AutoCompleteController;

use App\Http\Controllers\DeckbuilderController;
use App\Http\Controllers\CollectionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::post('/tokens/create', function(Request $request) {
//    $token = $request->user()->createToken($request->token_name);
//
//    return ['token' => $token->plainTextToken];
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// scryfall
Route::resource('scryfall/sets', SetController::class)->only('index', 'show');
Route::resource('scryfall/cards', CardController::class)->only('index', 'show');

Route::get('scryfall/autocomplete/cards', [AutoCompleteController::class, 'cardsAutocomplete']);

// EDHtoolkit
Route::resource('deckbuilders', DeckbuilderController::class)->only(['index', 'store']);
Route::resource('collections', CollectionController::class)->only(['index', 'store']);
Route::resource('cards', CardController::class)->only(['index', 'store']);


