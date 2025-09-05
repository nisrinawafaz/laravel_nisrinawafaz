<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login.page');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [HospitalController::class, 'index']);

    Route::resource('hospitals', HospitalController::class);
    Route::resource('patients', PatientController::class);
});
