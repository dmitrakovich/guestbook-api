<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::middleware('auth:sanctum')->post('logout', 'logout');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/reviews', [ReviewController::class, 'index']);
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::post('/reviews/{review}/replies', [ReplyController::class, 'store']);
});
