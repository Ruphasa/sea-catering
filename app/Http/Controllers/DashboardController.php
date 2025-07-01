<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Subscription;

  class DashboardController extends Controller
  {
      public function index()
      {
          $subscriptions = Subscription::where('user_id', auth()->user()->id)->get();
          return view('dashboard', compact('subscriptions'));
      }
  }
