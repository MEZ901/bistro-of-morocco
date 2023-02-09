<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;

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
Route::post('/logout', [UserController::class, 'logout']);

// Show Dashboard
Route::get('/dashboard', [MealController::class, 'dashboard']);

// Add Meal
Route::post('/meal/store', [MealController::class, 'store']);

// Delete Meal
Route::delete('/delete/{meal}', [MealController::class, 'delete']);

// Edit Meal
Route::get('/edit/{meal}', [MealController::class, 'edit']);

// Update Meal
Route::put('/meal/update/{meal}', [MealController::class, 'update']);