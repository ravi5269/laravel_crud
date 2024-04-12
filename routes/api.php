<?php

use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('BrandStore',[BrandController::class,'store']);
Route::post('/Brand/{id}', [BrandController::class,'update']);
Route::delete('/Brand/{id}', [BrandController::class,'destroy']);
Route::get('/Brand/{id}', [BrandController::class,'index']);
Route::get('/Brand', [BrandController::class,'index']);

Route::patch('Brand/{id}', [BrandController::class,'patch']);

