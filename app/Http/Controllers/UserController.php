<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register() {
        return view('user.register');
    }
    
    public function login() {
        return view('user.login');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'username' => 'required|min:3',
            'email' => ['required', 'email',  Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:4'
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/menu')->with('success_msg', 'Welcome, Your account has been created successfully!');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/menu')->with('success_msg', 'Welcome back!');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'You have been logged out successfully!');
    }
}
