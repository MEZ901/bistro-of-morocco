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
            'meals' => Meal::latest()->get()
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            // 'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
        Meal::create($formFields);
        return back()->with('success_msg', 'The meal has been added successfully!');
    }

    public function delete(Meal $meal) {
        $meal->delete();
        return back()->with('success_msg', 'The meal has been deleted successfully!');
    }
}
