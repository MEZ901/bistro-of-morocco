<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

// index
Route::get('/', [MealController::class, 'index']);

// Show the menu
Route::get('/menu', [MealController::class, 'menu']);

// Show Login Form
Route::get('/login', [UserController::class, 'login']);

// Show Register Form
Route::get('/register', [UserController::class, 'register']);

// Submit Register Form
Route::post('/users', [UserController::class, 'store']);

// Submit Login Form
Route::post('/auth', [UserController::class, 'authenticate']);

// Logout
Route::get('/logout', [UserController::class, 'logout']);

// Show Dashboard
Route::get('/dashboard', [MealController::class, 'dashboard'])->middleware(['auth', 'verified']);

// Add Meal
Route::post('/meal/store', [MealController::class, 'store'])->middleware(['auth', 'verified']);

// Delete Meal
Route::delete('/delete/{meal}', [MealController::class, 'delete'])->middleware(['auth', 'verified']);

// Edit Meal
Route::get('/edit/{meal}', [MealController::class, 'edit'])->middleware(['auth', 'verified']);

// Update Meal
Route::put('/meal/update/{meal}', [MealController::class, 'update'])->middleware(['auth', 'verified']);

// Show Single Meal
Route::get('/meal/{meal}', [MealController::class, 'show']);

// Account Settings
Route::get('/settings', [UserController::class, 'edit'])->middleware(['auth', 'verified']);

// Update Account Info
Route::put('/account/update', [UserController::class, 'Update'])->middleware(['auth', 'verified']);

// Email Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/menu');
})->middleware(['auth', 'signed'])->name('verification.verify');