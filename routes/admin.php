<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{AdminController, EventController, UserController};

// Admin (partial see guest.php)
Route::prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::get("/", [AdminController::class, "dashboard"])->name(
            "dashboard"
        );

        Route::post("/loguit", [AdminController::class, "logout"])->name(
            "logout"
        );
    });

// Events (CRUD - partial see guest.php)
Route::prefix("evenementen")
    ->name("events.")
    ->group(function () {
        Route::get("/aanmaken", [EventController::class, "create"])->name(
            "events.index"
        );
        Route::post("/", [EventController::class, "store"])->name("store");
        Route::get("/{event}/aanpassen", [
            EventController::class,
            "edit",
        ])->name("edit");
        Route::match(["PUT", "PATCH"], "/{event}", [
            EventController::class,
            "update",
        ])->name("update");
        Route::delete("/{event}", [EventController::class, "destroy"])->name(
            "destroy"
        );
    });

// Users (CRUD)
Route::prefix("gebruikers")
    ->name("users.")
    ->group(function () {
        Route::get("/", [UserController::class, "index"])->name("index");
        Route::get("/aanmaken", [UserController::class, "create"])->name(
            "create"
        );
        Route::post("/", [UserController::class, "store"])->name("store");
        Route::get("/{user}", [UserController::class, "show"])->name("show");
        Route::get("/{user}/aanpassen", [UserController::class, "edit"])->name(
            "edit"
        );
        Route::match(["PUT", "PATCH"], "/{user}", [
            UserController::class,
            "update",
        ])->name("update");
        Route::delete("/{user}", [UserController::class, "destroy"])->name(
            "destroy"
        );
    });
