<?php

use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/profesores/register',[ProfesorController::class, 'create'])->name('profesores.register');
Route::post('/profesores/register',[ProfesorController::class, 'store'])->name('profesores.store');

