<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('deckbuilders', \App\Http\Controllers\DeckbuilderController::class)->only(['index', 'store']);

Route::resource('collections', \App\Http\Controllers\CollectionController::class)->only(['index', 'store']);

Route::resource('cards', \App\Http\Controllers\CollectionController::class)->only(['index', 'store']);


