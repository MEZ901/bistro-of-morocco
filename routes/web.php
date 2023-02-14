<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

Route::middleware('guest')->group(function() {
    // index
    Route::get('/', [MealController::class, 'index']);

    // Show Login Form
    Route::get('/login', [UserController::class, 'login'])->name('login');

    // Show Register Form
    Route::get('/register', [UserController::class, 'register']);

    // Submit Register Form
    Route::post('/users', [UserController::class, 'store']);

    // Submit Login Form
    Route::post('/auth', [UserController::class, 'authenticate']);

    // The Password Reset Link Request Form
    Route::get('/forgot-password', function () {
        return view('user.forgot-password');
    })->name('password.request');

    // Handling The Form Submission
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['success_msg' => __($status)])
                    : back()->with(['failed_msg' => __($status)]);
    })->name('password.email');

    // The Password Reset Form
    Route::get('/reset-password/{token}', function ($token) {
        return view('user.reset-password', ['token' => $token]);
    })->name('password.reset');

    // Handling The Form Submission
    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        ); 
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with(['success_msg' => __($status)])
                    : back()->with(['failed_msg' => __($status)]);
    })->name('password.update');
});

Route::middleware('auth')->group(function() {
    // Logout
    Route::get('/logout', [UserController::class, 'logout']);

    // Email Verification Handler
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/menu');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::middleware('verified')->group(function() {
        // Show Dashboard
        Route::get('/dashboard', [MealController::class, 'dashboard'])->middleware('role:admin');

        // Add Meal
        Route::post('/meal/store', [MealController::class, 'store']);

        // Delete Meal
        Route::delete('/delete/{meal}', [MealController::class, 'delete']);

        // Edit Meal
        Route::get('/edit/{meal}', [MealController::class, 'edit']);

        // Update Meal
        Route::put('/meal/update/{meal}', [MealController::class, 'update']);

        // Account Settings
        Route::get('/settings', [UserController::class, 'edit']);

        // Update Account Info
        Route::put('/account/update', [UserController::class, 'Update']);
    }); 

    Route::middleware('role:superAdmin')->group(function() {
        // Super Admin Dashboard
        Route::get('/super/dashboard', [UserController::class, 'dashboard']);

        // Set Admin
        Route::patch('/set-admin/{user}', [UserController::class, 'setAdmin']);
    });
});

// Show the menu
Route::get('/menu', [MealController::class, 'menu']);

// Show Single Meal
Route::get('/meal/{meal}', [MealController::class, 'show']);

// Email Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');