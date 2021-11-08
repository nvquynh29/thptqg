<?php

use App\Http\Controllers\MarkController;
use App\Http\Controllers\PlaceController;
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

Route::get('/mark/{sbd}', [MarkController::class, 'show']);
Route::get('/suggest', [MarkController::class, 'suggestMajors']);
Route::get('/phase-all-subject', [MarkController::class, 'phaseAllSubject']);
Route::get('/phase-group', [MarkController::class, 'phaseByGroup']);
Route::get('/phase', [MarkController::class, 'phase']);
Route::get('/top-ten', [MarkController::class, 'topTen']);
Route::get('/top-ten-all', [MarkController::class, 'topTenAll']);
Route::get('/places', [PlaceController::class, 'index']);
