<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Testimonial;

  class TestimonialController extends Controller
  {
      public function index()
      {
          $testimonials = Testimonial::all();
          return view('testimonials', compact('testimonials'));
      }

      public function store(Request $request)
    {
        $request->validate([
            'meal_plan_id' => 'required|exists:meal_plans,id',
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        $testimonial = new Testimonial();
        $testimonial->meal_plan_id = $request->meal_plan_id;
        $testimonial->user_id = auth()->id();
        $testimonial->review = $request->review;
        $testimonial->rating = $request->rating;
        $testimonial->save();

        // Update average rating for meal plan (opsional)
        $mealPlan = $testimonial->mealPlan;
        $mealPlan->rating = $mealPlan->testimonials()->avg('rating');
        $mealPlan->save();

        return response()->json(['success' => true, 'message' => 'Testimony submitted!']);
    }
  }
