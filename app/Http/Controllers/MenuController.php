<?php

namespace App\Http\Controllers;

use App\Models\MealPlan;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $mealPlans = MealPlan::all();
        return view('menu', compact('mealPlans'));
    }

    public function show($id)
    {
        $mealPlan = MealPlan::findOrFail($id);
        $testimonials = Testimonial::where('meal_plan_id', $id)->with('user')->get();
        return view('menu.show', compact('mealPlan', 'testimonials'));
    }
}
