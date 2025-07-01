<?php

  namespace App\Http\Controllers;

  use App\Models\Subscription;
  use Illuminate\Http\Request;
  use Illuminate\Support\Carbon;

  class AdminController extends Controller
  {
      public function index(Request $request)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        
        // Filter berdasarkan date range
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth());

        // New Subscriptions
        $newSubscriptions = Subscription::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'Active')
            ->count();

        // MRR (asumsi total_price adalah bulanan)
        $mrr = Subscription::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'Active')
            ->sum('total_price');

        // Reactivations (dari cancelled ke active)
        $reactivations = Subscription::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'Active')
            ->whereNotNull('pause_end')
            ->where('pause_end', '<', $startDate)
            ->count();

        // Subscription Growth (total aktif)
        $subscriptionGrowth = Subscription::where('status', 'Active')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();

        return view('admin', compact(
            'newSubscriptions',
            'mrr',
            'reactivations',
            'subscriptionGrowth',
            'startDate',
            'endDate'
        ));
    }
  }
