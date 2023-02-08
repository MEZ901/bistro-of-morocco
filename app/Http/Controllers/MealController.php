<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function menu() {
        return view('food.menu');
    }
}
