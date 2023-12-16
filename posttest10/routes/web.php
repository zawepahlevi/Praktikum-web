<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/pesanAdmin', [FormController::class, 'submitForm'])->name('submit-form');
Route::post('/show-form', [FormController::class, 'showForm'])->name('show-form');
Route::get('/', function () {
    return redirect()->route('show-form-pesan'); // Ubah rute ke show-form-pesan
});


// Route::get('/', function () {
//     return "hallo world"; // Ubah rute ke show-form-pesan
// });
