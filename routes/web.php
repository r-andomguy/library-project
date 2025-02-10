<?php

use App\Http\Controllers\Auth\WebAuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/auth-web', [WebAuthController::class, 'showLoginForm'])->name('auth.web');
Route::post('/auth-web-login', [WebAuthController::class, 'login'])->name('auth.web.login');
Route::post('/auth-web-logout', [WebAuthController::class, 'logout'])->name('auth.web.logout');

Route::middleware(['web-admin'])->group(function () {
    Route::resource('books', BookController::class);
});
require __DIR__ . '/auth.php';
