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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getData',[\App\Http\Controllers\NewsController::class,'getData']);
Route::get('edit/{id}',[\App\Http\Controllers\NewsController::class,'edit']);
Route::put('edit/{id}',[\App\Http\Controllers\NewsController::class,'update']);
Route::delete('delete/{id}',[\App\Http\Controllers\NewsController::class,'delete']);
Route::post('insertData',[\App\Http\Controllers\NewsController::class,'createData']);
// http://localhost:8000/api/getData
