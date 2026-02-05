<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;


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



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('user')->group(function(){
        Route::get('/profile', [UserController::class, 'profile']);
        Route::post('/profile', [UserController::class, 'updateProfile']);
        Route::post('/change-password', [UserController::class, 'changePassword']);
        Route::post('/profile/photo', [UserController::class, 'uploadPhoto']);
    });


Route::middleware(['role:professional'])->group(function(){
        Route::get('/professional/dashboard', function () {
            return response()->json([
                'message' => 'Welcome Professional'
            ]);
        });
    });
});