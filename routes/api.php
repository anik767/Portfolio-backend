<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectPostController;
// project 
Route::get('/project-posts', [ProjectPostController::class, 'index']);
Route::post('/project-posts', [ProjectPostController::class, 'store']);
Route::get('/project-posts/{id}', [ProjectPostController::class, 'show']);
Route::put('/project-posts/{id}', [ProjectPostController::class, 'update']);
Route::delete('/project-posts/{id}', [ProjectPostController::class, 'destroy']);

// contact 
Route::post('/contact', [ContactController::class, 'submit']);
Route::get('/admin/contacts', [ContactController::class, 'index']);
Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy']);

