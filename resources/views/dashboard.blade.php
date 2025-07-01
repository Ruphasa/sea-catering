@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-600 mb-8 flex items-center"><i class="fas fa-tachometer-alt mr-2"></i>{{ auth()->user()->name }} Dashboard</h1>

    <!-- Active Subscriptions -->
    <div class="bg-white p-6 rounded-lg shadow mb-8">
        <h2 class="text-xl font-semibold text-blue-600 mb-4 flex items-center"><i class="fas fa-clipboard-list mr-2"></i> Active Subscriptions</h2>
        @if ($subscriptions->isEmpty())
            <p class="text-gray-600 text-center py-4">No active subscriptions yet. <a href="{{ route('menu') }}" class="text-blue-500 underline">Subscribe now!</a></p>
        @else
            @foreach ($subscriptions as $subscription)
                <div class="border p-4 mb-4 rounded-lg hover:bg-gray-50 transition">
                    <h3 class="text-lg font-medium text-blue-600">{{ $subscription->plan }}</h3>
                    <p class="text-gray-700">Meal Types: <span class="font-semibold">{{ $subscription->meal_types }}</span></p>
                    <p class="text-gray-700">Delivery Days: <span class="font-semibold">{{ $subscription->delivery_days }}</span></p>
                    <p class="text-gray-700">Total Price: <span class="font-semibold">Rp {{ number_format($subscription->total_price, 2) }}</span></p>
                    <p class="text-gray-700">Status: <span class="font-semibold {{ $subscription->status == 'Paused' ? 'text-yellow-500' : ($subscription->status == 'Cancelled' ? 'text-red-500' : 'text-green-500') }}">{{ $subscription->status }}</span></p>
                    @if ($subscription->status == 'Active')
                        <div class="mt-4 flex space-x-2">
                            <button onclick="document.getElementById('pause-modal-{{ $subscription->id }}').classList.remove('hidden')" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 flex items-center"><i class="fas fa-pause mr-1"></i> Pause</button>
                            <button onclick="document.getElementById('cancel-modal-{{ $subscription->id }}').classList.remove('hidden')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 flex items-center"><i class="fas fa-times mr-1"></i> Cancel</button>
                        </div>
                    @endif

                    <!-- Pause Modal -->
                    <div id="pause-modal-{{ $subscription->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                            <h3 class="text-xl font-bold text-blue-600">Pause Subscription</h3>
                            <form method="POST" action="{{ route('subscriptions.pause', $subscription->id) }}" class="mt-4">
                                @csrf
                                @method('PATCH')
                                <div class="mb-4">
                                    <label class="block text-gray-700">Start Date</label>
                                    <input type="date" name="start_date" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700">End Date</label>
                                    <input type="date" name="end_date" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                <div class="flex justify-end space-x-2">
                                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Confirm</button>
                                    <button type="button" onclick="document.getElementById('pause-modal-{{ $subscription->id }}').classList.add('hidden')" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Cancel Modal -->
                    <div id="cancel-modal-{{ $subscription->id }}" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center z-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                            <h3 class="text-xl font-bold text-red-600">Cancel Subscription</h3>
                            <p class="text-gray-700 mb-4">Are you sure? This action cannot be undone.</p>
                            <form method="POST" action="{{ route('subscriptions.cancel', $subscription->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-end space-x-2">
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Confirm</button>
                                    <button type="button" onclick="document.getElementById('cancel-modal-{{ $subscription->id }}').classList.add('hidden')" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
