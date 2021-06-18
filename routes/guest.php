<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AdminController,
    EventController,
    RegistrationController
};

/*
| Guest routes
| ------------
| Middleware: [web]
|
| These routes are not checked for authentication
|
*/

// Admin (partial see admin.php)
Route::prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::get("/login", [AdminController::class, "login"])->name("login");
        Route::post("/login", [AdminController::class, "authenticate"])->name(
            "authenticate"
        );
    });

// Events (CRUD - partial see admin.php)
Route::get("/", [EventController::class, "index"])->name("events.index");
Route::get("/evenementen/{event}", [EventController::class, "show"])->name(
    "events.show"
);

// Registrations (CRUD store, delete)
Route::post("/evenementen/{event}/registraties", [
    RegistrationController::class,
    "store",
])->name("events.registrations.store");
Route::delete("/registraties/{registration}", [
    RegistrationController::class,
    "destroy",
])->name("registrations.destroy");