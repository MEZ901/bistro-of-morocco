<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function menu() {
        return view('food.menu');
    }

    public function dashboard() {
        return view('admin.dashboard', [
            'meals' => Meal::all()
        ]);
    }
}
