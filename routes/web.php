<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::middleware('auth')->group(function () {
    Route::get("/", [DashboardController::class,"index"])->name("dashboard");
});

Route::get("/login", [AuthController::class,"LoginView"])->name("login");
Route::post("/login/auth", [AuthController::class,"Login"])->name("auth");



