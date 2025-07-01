@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Meal Plans</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($mealPlans as $plan)
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition cursor-pointer">
                <h2 class="text-xl font-semibold text-blue-500">{{ $plan->name }}</h2>
                <p class="text-gray-600 mt-2">Rp {{ number_format($plan->price, 0) }}/meal</p>
                <p class="text-gray-700 mt-2 line-clamp-3">{{ $plan->description }}</p>
                <a href="{{ route('menu.show', $plan->id) }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 inline-block text-center">See More Details</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
