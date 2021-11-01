<?php

use App\Http\Controllers\MarkController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/mark/{sbd}', [MarkController::class, 'show']);
Route::get('/phase-subject', [MarkController::class, 'phaseBySubject']);
Route::get('/phase-group', [MarkController::class, 'phaseByGroup']);