<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ShoeController;
use App\Http\Controllers\ShoesController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('shoe', ShoeController::class);
Route::get('/shoe', [ShoesController::class, 'index']);
Route::get('/shoe/{id}', [ShoesController::class, 'show']);

Route::post('/shoe/{id}/edit', [ShoesController::class, 'update']);
Route::get('/shoe/{id}/edit', [ShoesController::class, 'edit']);

Route::post('/shoe/add', [ShoesController::class, 'store']);


