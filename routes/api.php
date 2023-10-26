<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Response;

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
Route::get('/', function() {
    return response()->json("CvSU ILS API v2.0", Response::HTTP_OK);
});
Route::post('/oauth/token', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::resource('patrons', 'App\Http\Controllers\API\Koha\PatronController')
        ->except(['store', 'create', 'edit', 'update', 'destroy']);
    Route::post('/oauth/revoke', [AuthController::class, 'logout']);
});
Route::fallback(function(){
    return response()->json([
        'message' => 'Endpoint not exists.'], Response::HTTP_NOT_FOUND);
});