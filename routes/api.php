<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectPostController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Public Routes (No Auth Required)
|--------------------------------------------------------------------------
*/

// Auth Routes
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Project Posts - Public View (if applicable)
Route::get('/project-posts', [ProjectPostController::class, 'index']);
Route::get('/project-posts/{id}', [ProjectPostController::class, 'show']);

// Contact Submit (Public User)
Route::post('/contact', [ContactController::class, 'submit']);

/*
|--------------------------------------------------------------------------
| Protected Routes (Require Sanctum Auth)
|--------------------------------------------------------------------------
*/



Route::middleware('auth:sanctum')->group(function () {
    // Authenticated user info
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Project Posts - CRUD (Admin or Authenticated)
    Route::post('/project-posts', [ProjectPostController::class, 'store']);
    Route::put('/project-posts/{id}', [ProjectPostController::class, 'update']);
    Route::delete('/project-posts/{id}', [ProjectPostController::class, 'destroy']);

    // Contact Admin View
    Route::get('/admin/contacts', [ContactController::class, 'index']);
    Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy']);
});
