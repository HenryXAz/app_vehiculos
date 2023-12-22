<?php

use App\Http\Controllers\Users\UserModuleController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function() {
    Route::get('', [UserModuleController::class, 'index'])->name('users.index');
    Route::get('/create', [UserModuleController::class, 'create'])->name('users.create');
    Route::post('/store', [UserModuleController::class, 'store'])->name('users.store');
    Route::get('/edit/{email}', [UserModuleController::class, 'edit'])->name('users.edit');
    Route::post('/update', [UserModuleController::class, 'update'])->name('users.update');
    Route::get('/search', [UserModuleController::class, 'search'])->name('users.search');
    Route::get('/delete/{id}', [UserModuleController::class, 'destroy'])->name('users.destroy');
});