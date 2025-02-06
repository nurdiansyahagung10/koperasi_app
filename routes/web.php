<?php

use App\Http\Controllers\ResortController;
use App\Models\BranchOffice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckExpToken;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HeadOfficeController;
use App\Http\Controllers\BranchOfficeController;

Route::middleware("auth")->group(function () {
    Route::get("/logout", [AuthController::class, "Logout"])->name("logout");
    Route::middleware([CheckExpToken::class])->group(function () {
        Route::get("/", [DashboardController::class, "homeview"])->name("home");
        Route::get("users", [UserController::class, "index"])->name("users");
        Route::resource("/roles", RoleController::class)->only(["index",])->names(["index" => "roles"]);
        Route::resource("/head_offices", HeadOfficeController::class)->except(["destroy"])->names(["index" => "head_offices"]);
        Route::resource("/branch_offices", BranchOfficeController::class)->except(["destroy"])->names(["index" => "branch_offices"]);
        Route::resource("/resorts/branch_offices/{branch_id}/selectresort", ResortController::class)->except(["destroy"])->names(["index" => "resort", "create" => "resort.create", "store"=>"resort.store","update"=>"resort.update"]);
        Route::get("/permissions/{id}", [RoleController::class, "permissions"])->name("permissions");
    });

});

Route::middleware('guest')->group(function () {
    Route::get("/login", [AuthController::class, "LoginView"])->name("login");
    Route::post("/login/auth", [AuthController::class, "Login"])->name("auth");
});







