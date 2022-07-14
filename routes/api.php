<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CakeController;
use App\Http\Controllers\Api\InterestedEmailController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('cakes', CakeController::class);

Route::get('interested_emails', [InterestedEmailController::class, 'index']);
Route::get('interested_emails/{id}', [InterestedEmailController::class, 'show']);
Route::middleware('check.availability.cake')->post('interested_emails', [InterestedEmailController::class, 'store']);