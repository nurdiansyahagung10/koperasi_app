<?php

use App\Http\Controllers\BranchemployeesController;
use App\Http\Controllers\DetailResortController;
use App\Http\Controllers\HeademployeesController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\PdlController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HeadOfficeController;
use App\Http\Controllers\BranchOfficeController;
use App\Http\Controllers\ResortController;

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
    Route::get("v1/branch_offices", [ApiController::class, "branch_offices"])->name("apibranch_offices");
    Route::get("v1/members", [ApiController::class, "members"])->name("apimembers");
    Route::get("v1/advance_payments", [ApiController::class, "advance_payments"])->name("apiadvance_payments");
    Route::get("v1/{type}/head_employees", [ApiController::class, "head_employees"])->name("apihead_employees");
    Route::get("v1/{type}/branch_employees", [ApiController::class, "branch_employees"])->name("apibranch_employees");
    Route::put("v1/set_permissions/{role}", [RoleController::class, "set_permissions"])->name("apiset_permissions");
    Route::get("v1/get_role/{id}", [ApiController::class, "get_role"])->name("apiget_role");
    Route::get("v1/{role}/get_branch_offices/head_office/{head_id}", [ApiController::class, "get_branch_office_from_head_office_for_employees"])->name("apiget_branch_office_from_head_office_for_employees");
    Route::get("v1/get_branch_offices/head_office/{head_id}", [ApiController::class, "get_branch_office_from_head_office"])->name("apiget_branch_office_from_head_office");
    Route::get("v1/resorts/branch_office/{branch_id}/resort", [ApiController::class, "resorts"])->name("apiresorts");
    Route::get("v1/resorts_have_pdl/branch_office/{branch_id}/resort", [ApiController::class, "resorts_have_pdl"])->name("apiresorts_have_pdl");
    Route::get("v1/detailresorts/resort/{resort_id}/detailresort", [ApiController::class, "detailresorts"])->name("apidetailresort");
    Route::get("v1/pdls/branch_employee/pdl", [ApiController::class, "pdls"]);
    Route::get("v1/loan_applications", [ApiController::class, "loan_applications"]);
    Route::get("v1/droppings", [ApiController::class, "droppings"]);
    Route::get("v1/pdls/branch_employee/branch/{branch_id}", [ApiController::class, "get_pdls_from_branch"]);
    Route::resource("v1/head_office", HeadOfficeController::class)->only("destroy");
    Route::resource("v1/branch_office", BranchOfficeController::class)->only("destroy");
    Route::resource("v1/resort", ResortController::class)->only("destroy");
    Route::resource("v1/detailresort", DetailResortController::class)->only("destroy");
    Route::resource("v1/member", MembersController::class)->only("destroy");
    Route::resource("v1/{role}/head_employee", HeademployeesController::class)->only("destroy");
    Route::resource("v1/{role}/branch_employee", BranchemployeesController::class)->only("destroy");
    Route::resource("v1/pdls/branch_employee/pdl", PdlController::class)->only("destroy");
});

