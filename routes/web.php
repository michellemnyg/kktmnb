<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;

// Jalur Publik (Landing Page)
Route::get('/', [PageController::class, 'index'])->name('home');

// Jalur Autentikasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Jalur Admin (Dikunci oleh Middleware Auth)
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/management', [AdminController::class, 'management'])->name('admin.management');
    Route::post('/management', [AdminController::class, 'saveData']); // Jalur untuk simpan data operator
});