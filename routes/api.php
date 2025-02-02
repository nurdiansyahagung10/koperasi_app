<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HeadOfficeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::get("v1/roles", [ApiController::class, "role"])->name("apirole");
    Route::get("v1/user", [ApiController::class, "user"])->name("apiuser");
    Route::get("v1/all_users", [ApiController::class, "all_users"])->name("apiall_users");
    Route::get("v1/permissions", [ApiController::class, "permissions"])->name("apipermissions");
    Route::get("v1/head_offices", [ApiController::class, "head_offices"])->name("apihead_offices");
    Route::put("v1/set_permissions/{role}", [RoleController::class, "set_permissions"])->name("apiset_permissions");
    Route::get("v1/get_role/{id}", [ApiController::class, "get_role"])->name("apiget_role");
    Route::resource("v1/head_offices", HeadOfficeController::class)->only("destroy");
});

