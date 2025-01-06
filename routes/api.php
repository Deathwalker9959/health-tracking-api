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


use App\Http\Controllers\MealController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\HealthDataController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Response;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/preferences', [PreferenceController::class, 'index']);
    Route::patch('/preferences', [PreferenceController::class, 'update']); // No ID needed    Route::apiResource('/health-data', HealthDataController::class)->only(['index', 'store']);
    Route::apiResource('/meals', MealController::class)->only(['index', 'store']);
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

// Fallback route for undefined API routes
Route::fallback(function () {
    return response()->json([
        'message' => 'Resource not found.',
    ], Response::HTTP_NOT_FOUND);
});
