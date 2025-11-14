<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/auth.login', 'login')->name('auth.login');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [MainController::class, 'index'])->name('home');

    Route::get('/note', [MainController::class, 'newNote'])->name('new.note');
    Route::post('/note/create', [MainController::class, 'store'])->name('store.note');
    Route::delete('/notes/delete/{id}', [MainController::class, 'destroy'])->name('delete.note');
    Route::get('/note/{id}/edit', [MainController::class, 'edit'])->name('edit.note');
    Route::put('/note/edit/{id}', [MainController::class, 'update'])->name('update.note');
});
