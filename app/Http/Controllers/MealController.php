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
        return view('meal.menu', [
            'meals' => Meal::latest()->paginate(6)
        ]);
    }

    public function dashboard() {
        return view('admin.dashboard', [
            'meals' => Meal::latest()->paginate(6)
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        if($request->hasFile('image')) $formFields['image'] = $request->file('image')->store('logos', 'public');
        Meal::create($formFields);
        return back()->with('success_msg', 'The meal has been added successfully!');
    }

    public function delete(Meal $meal) {
        $meal->delete();
        return back()->with('success_msg', 'The meal has been deleted successfully!');
    }

    public function edit(Meal $meal) {
        return view('admin.edit', ['meal' => $meal]);
    }

    public function update(Request $request, Meal $meal) {
        $formFields = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        if($request->hasFile('image')) $formFields['image'] = $request->file('image')->store('logos', 'public');
        $meal->update($formFields);
        return redirect('/dashboard')->with('success_msg', 'The meal has been updated successfully!');
    }

    public function show(Meal $meal) {
        return view('meal.show', ['meal' => $meal]);
    }
}
