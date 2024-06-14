<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

// Rute untuk halaman home
Route::get('/', [PageController::class, 'home'])->name('home');

// Rute untuk kosmetik dengan middleware auth.custom
Route::middleware('auth.custom')->group(function () {
    Route::get('/cosmetics', [PageController::class, 'cosmetics'])->name('cosmetics');
    Route::get('/addcosmetics', [PageController::class, 'addcosmetics'])->name('addcosmetics');
    Route::post('/savecosmetics', [PageController::class, 'savecosmetics'])->name('savecosmetics');
    Route::get('/editcosmetics/{id}', [PageController::class, 'editcosmetics'])->name('editcosmetics');
    Route::put('/updatecosmetics/{id}', [PageController::class, 'updatecosmetics'])->name('updatecosmetics');
    Route::delete('/deletecosmetics/{id}', [PageController::class, 'deletecosmetics'])->name('deletecosmetics');
});

// Rute untuk login, signup, dan logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
