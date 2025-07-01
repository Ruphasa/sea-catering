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
              'name' => 'required|string|max:255',
              'review' => 'required|string',
              'rating' => 'required|integer|between:1,5',
          ]);

          Testimonial::create([
              'name' => $request->name,
              'review' => $request->review,
              'rating' => $request->rating,
          ]);

          return redirect()->route('testimonials')->with('success', 'Testimonial submitted successfully!');
      }
  }
