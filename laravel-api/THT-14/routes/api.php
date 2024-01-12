<?php

use App\Http\Controllers\Api\MahasiswaController;
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

// Route::get('mahasiswa',[MahasiswaController::class,'index']);
// Route::get('mahasiswa/{id}',[MahasiswaController::class,'show']);
// Route::post('mahasiswa',[MahasiswaController::class,'store']);
// Route::put('mahasiswa/{id}',[MahasiswaController::class,'update']);
// Route::delete('mahasiswa/{id}',[MahasiswaController::class,'destroy']);

Route::apiResource('mahasiswa',MahasiswaController::class);
