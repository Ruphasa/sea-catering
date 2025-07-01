@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">SEA Catering Admin Dashboard</h1>

    <!-- Date Range Selector -->
    <div class="mb-6">
        <form method="GET" action="{{ route('admin') }}" class="flex space-x-4">
            <input type="date" name="start_date" value="{{ $startDate }}" class="border p-2 rounded">
            <input type="date" name="end_date" value="{{ $endDate }}" class="border p-2 rounded">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Filter</button>
        </form>
    </div>

    <!-- Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl">
            <h3 class="text-xl font-semibold text-blue-500">New Subscriptions</h3>
            <p class="text-2xl text-gray-700 mt-2">{{ $newSubscriptions }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl">
            <h3 class="text-xl font-semibold text-blue-500">Monthly Recurring Revenue (MRR)</h3>
            <p class="text-2xl text-gray-700 mt-2">Rp {{ number_format($mrr, 2) }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl">
            <h3 class="text-xl font-semibold text-blue-500">Reactivations</h3>
            <p class="text-2xl text-gray-700 mt-2">{{ $reactivations }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl">
            <h3 class="text-xl font-semibold text-blue-500">Subscription Growth</h3>
            <p class="text-2xl text-gray-700 mt-2">{{ $subscriptionGrowth }}</p>
        </div>
    </div>
</div>
@endsection
