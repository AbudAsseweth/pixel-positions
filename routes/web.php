<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/', [JobController::class, 'index'])->name("home");
Route::get('/search', SearchController::class);
Route::get("/tags/{tag}", TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredController::class, 'create'])->name("register");
    Route::post('/register', [RegisteredController::class, 'store'])->name("register");

    Route::get("/login", [SessionController::class, 'create'])->name("login");
    Route::post("/login", [SessionController::class, 'store'])->name("login");
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
    Route::get('/jobs/create', [JobController::class, 'create'])->name("jobs.create");
    Route::post("/jobs", [JobController::class, 'store'])->name('jobs.store');
});
