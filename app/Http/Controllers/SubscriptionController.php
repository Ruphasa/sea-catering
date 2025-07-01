<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\MealPlan;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    public function create()
    {
        $mealPlans = MealPlan::all();
        return view('subscribe', compact('mealPlans'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required|string|max:15',
                'meal_plan_id' => 'required|exists:meal_plans,id',
                'meal_types' => 'required|array|min:1',
                'delivery_days' => 'required|array|min:1',
                'allergies' => 'nullable|string|max:500',
            ]);

            $mealPlan = MealPlan::findOrFail($request->meal_plan_id);
            if (!$mealPlan) {
                throw new \Exception('Meal plan not found');
            }

            if (!auth()->check()) {
                throw new \Exception('User not authenticated');
            }

            $totalPrice = $mealPlan->price * count($request->meal_types) * count($request->delivery_days) * 4.3;

            $subscription = new Subscription();
            $subscription->user_id = auth()->id();
            $subscription->phone = $request->phone;
            $subscription->meal_plan_id = $request->meal_plan_id;
            $subscription->meal_types = implode(', ', $request->meal_types);
            $subscription->delivery_days = implode(', ', $request->delivery_days);
            $subscription->allergies = $request->allergies;
            $subscription->total_price = $totalPrice;
            $subscription->status = 'Active';
            $subscription->save();

            return response()->json([
                'success' => true,
                'message' => 'Subscription created successfully! Total: Rp ' . number_format($totalPrice, 2),
                'redirect' => url('/dashboard')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function pause(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $userId = auth()->id();
        $subscriptionUserId = $subscription->user_id;

        if ((int)$userId !== (int)$subscriptionUserId) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $subscription->update([
            'status' => 'Paused',
            'pause_start' => $request->start_date,
            'pause_end' => $request->end_date,
        ]);

        return redirect()->route('dashboard')->with('success', 'Subscription paused successfully!');
    }

    public function cancel($id)
    {
        $subscription = Subscription::findOrFail($id);
        $userId = auth()->id();
        $subscriptionUserId = $subscription->user_id;

        if ((int)$userId !== (int)$subscriptionUserId) {
            abort(403, 'Unauthorized action.');
        }

        $subscription->update(['status' => 'Cancelled']);
        return redirect()->route('dashboard')->with('success', 'Subscription cancelled successfully!');
    }

    public function showModal($id)
    {
        $mealPlan = MealPlan::findOrFail($id);
        return view('subscription', compact('mealPlan'))->render();
    }
}
