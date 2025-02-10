<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\AuthorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware(['auth:sanctum', 'api-admin'])->group(function () {
    Route::apiResource('authors', AuthorController::class);
});
