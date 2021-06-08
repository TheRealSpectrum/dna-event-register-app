<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{AdminController, EventController, UserController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("welcome");
});

Route::get("/admin", [AdminController::class, "dashboard"])->name(
    "admin.dashboard"
);
route::get("/", [EventController::class, "index"])->name("events.index");
Route::resource("events", EventController::class)->except(["index"]);
Route::resource("users", UserController::class);

Route::get("/admin/login", [AdminController::class, "login"])->name(
    "admin.login"
);
route::post("/admin/login", [AdminController::class, "authenticate"])->name(
    "admin.authenticate"
);
