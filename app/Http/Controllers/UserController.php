<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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
        return redirect('/menu')->with('message', 'You have been logged out successfully!');
    }

    public function edit() {
        return view('admin.account-settings');
    }

    public function update(Request $request) {
        if($request->current_password || $request->password) {
            if(!Hash::check($request->current_password, auth()->user()->password)){
                return back()->with('failed_msg', 'The current password is incorrect');
            }
            $formFields = $request->validate([
                'username' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:4'
            ]);
            $formFields['password'] = bcrypt($formFields['password']);
        } else {
            $formFields = $request->validate([
                'username' => 'required|min:3',
                'email' => 'required|email'
            ]);
        }
        auth()->user()->update($formFields);
        return back()->with('success_msg', 'The profile information has been updated successfully!');
    }
}
