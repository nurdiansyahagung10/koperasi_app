<?php

use App\Http\Controllers\AdvancePaymentController;
use App\Http\Controllers\BranchemployeesController;
use App\Http\Controllers\DroppingController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\PdlController;
use App\Http\Controllers\ResortController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckExpToken;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HeadOfficeController;
use App\Http\Controllers\BranchOfficeController;
use App\Http\Controllers\DetailResortController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\HeademployeesController;

Route::middleware("auth")->group(function () {
    Route::get("/logout", [AuthController::class, "Logout"])->name("logout");
    Route::middleware([CheckExpToken::class])->group(function () {
        Route::get("/", [DashboardController::class, "homeview"])->name("home");
        Route::get("users", [UserController::class, "index"])->name("users");
        Route::resource("roles", RoleController::class)->only(["index",])->names(["index" => "roles"]);
        Route::resource("head_offices", HeadOfficeController::class)->except(["destroy"])->names(["index" => "head_offices"]);
        Route::resource("branch_offices", BranchOfficeController::class)->except(["destroy"])->names(["index" => "branch_offices"]);
        Route::resource("resorts/branch_office/{branch_id}/resort", ResortController::class)->except(["destroy"])->names(["index" => "resorts"]);
        Route::resource("detailresorts/resort/{resort_id}/detailresort",  DetailResortController::class)->except(["destroy"])->names(["index" => "detailresorts"]);
        Route::resource("members",  MembersController::class)->except(["destroy"])->names(["index" => "members"]);
        Route::resource("advance_payments",  AdvancePaymentController::class)->except(["destroy"])->names(["index" => "advance_payments"]);
        Route::resource("{role}/employees/head_employees",  HeademployeesController::class)->except(["destroy"])->names(["index" => "head_employees"]);
        Route::resource("{role}/employees/branch_employees",  BranchemployeesController::class)->except(["destroy"])->names(["index" => "branch_employees"]);
        Route::resource("pdls/branch_employees/pdls",  PdlController::class)->except(["destroy"])->names(["index" => "pdls"]);
        Route::resource("loan_applications",  LoanApplicationController::class)->except(["destroy"])->names(["index" => "loan_applications"]);
        Route::resource("droppings",  DroppingController::class)->except(["destroy"])->names(["index" => "droppings"]);
        Route::get("permissions/roles/{id}", [RoleController::class, "permissions"])->name("permissions");
        Route::get("{role}/employees/head_employees/{id}/renew_password", [HeademployeesController::class, "renew_password_view"])->name("head_employee.renew_password_view");
        Route::put("{role}/employees/head_employees/{id}/renew_password", [HeademployeesController::class, "renew_password"])->name("head_employee.renew_password");
        Route::get("{role}/employees/branch_employees/{id}/renew_password", [BranchemployeesController::class, "renew_password_view"])->name("branch_employee.renew_password_view");
        Route::put("{role}/employees/branch_employees/{id}/renew_password", [BranchemployeesController::class, "renew_password"])->name("branch_employee.renew_password");
        Route::put("loan_applications/{loan_application}/action", [LoanApplicationController::class, "action"])->name("loan_applications.action");
        Route::put("droppings/{dropping}/cancelled", [DroppingController::class, "cancelled"])->name("droppings.cancelled");
    });

});

Route::middleware('guest')->group(function () {
    Route::get("login", [AuthController::class, "LoginView"])->name("login");
    Route::post("login/auth", [AuthController::class, "Login"])->name("auth");
});







