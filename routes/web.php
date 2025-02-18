<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Routes for views
Route::get('/login', [PageController::class, 'showLogin'])->name('login');
Route::get('/register', [PageController::class, 'showRegister'])->name('register');
Route::get('/checklists', [PageController::class, 'showChecklist'])->middleware('jwt.web')->name('checklists');

