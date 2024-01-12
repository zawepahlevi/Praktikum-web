<?php

use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('film', [FilmController::class, 'index']);
// Route::post('film', [FilmController::class, 'store']);
// Route::get('film/{id}', [FilmController::class, 'edit']);
// Route::put('film/{id}', [FilmController::class, 'update']);
// // Route::get('film', [FilmController::class, 'update']);
// // Route::get('film', [FilmController::class, 'destroy']);