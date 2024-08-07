<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [\App\Http\Controllers\tiketcontroller::class, 'index'])->name('logview');
Route::post('/login', [\App\Http\Controllers\tiketcontroller::class, 'login'])->name('log');
Route::get('/register', [\App\Http\Controllers\tiketcontroller::class, 'regview'])->name('reg.view');
Route::post('/register', [\App\Http\Controllers\tiketcontroller::class, 'register'])->name('register');
Route::get('/logout', [\App\Http\Controllers\tiketcontroller::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/tiket', [\App\Http\Controllers\tiketcontroller::class, 'listtiket'])->name('tiket');
    Route::post('/tiket', [\App\Http\Controllers\tiketcontroller::class, 'add'])->name('tiket.tambah');
    Route::get('/tiket/{id}', [\App\Http\Controllers\tiketcontroller::class, 'edit'])->name('tiket.edit');
    Route::post('/tiket/{id}', [\App\Http\Controllers\tiketcontroller::class, 'update'])->name('tiket.update');
    Route::get('/tiket/{id}/delete', [\App\Http\Controllers\tiketcontroller::class, 'delete'])->name('tiket.delete');
    Route::get('/tiket/{id}/done', [\App\Http\Controllers\tiketcontroller::class, 'donetiket'])->name('tiket.done');
    Route::get('/tiket/{id}/run', [\App\Http\Controllers\tiketcontroller::class, 'runtiket'])->name('tiket.run');
});

