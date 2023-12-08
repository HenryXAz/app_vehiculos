<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::view("login", "pages.auth.login")->name("login");
    Route::post("login", [AuthController::class, "login"])->name("auth.login.store");
});

Route::group(['middleware' => "auth"], function () {
    Route::post("log-out", [AuthController::class, "logOut"])->name("auth.logOut");
});