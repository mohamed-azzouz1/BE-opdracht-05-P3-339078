<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeverancierController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/leverancier', [LeverancierController::class, 'index'])->name('leverancier.index');
Route::post('/leverancier/filter', [LeverancierController::class, 'index'])->name('leverancier.indexfilter');
// Route::get('/leverancier/{ProductNaam}', [LeverancierController::class, 'spec'])->name('leverancier.specifiek');
