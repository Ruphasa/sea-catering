@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Subscribe to SEA Catering</h1>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('subscribe') }}">
            @csrf
            {{-- input phone number --}}
            <div class = "mb-4">
                <label class="block text-gray-700">* Phone Number</label>
                <input type="text" name="phone" class="w-full p-2 border rounded" required>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">* Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">* Active Phone Number</label>
                <input type="text" name="phone" class="w-full p-2 border rounded" required>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">* Plan Selection</label>
                <select name="plan" class="w-full p-2 border rounded" required>
                    <option value="Diet Plan">Diet Plan - Rp30.000,00/meal</option>
                    <option value="Protein Plan">Protein Plan - Rp40.000,00/meal</option>
                    <option value="Royal Plan">Royal Plan - Rp60.000,00/meal</option>
                </select>
                @error('plan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">* Meal Type (Select at least one)</label>
                <div>
                    <label><input type="checkbox" name="meal_types[]" value="Breakfast" required> Breakfast</label>
                    <label><input type="checkbox" name="meal_types[]" value="Lunch"> Lunch</label>
                    <label><input type="checkbox" name="meal_types[]" value="Dinner"> Dinner</label>
                </div>
                @error('meal_types')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">* Delivery Days (Select any combination)</label>
                <div>
                    <label><input type="checkbox" name="delivery_days[]" value="Monday" required> Monday</label>
                    <label><input type="checkbox" name="delivery_days[]" value="Tuesday"> Tuesday</label>
                    <label><input type="checkbox" name="delivery_days[]" value="Wednesday"> Wednesday</label>
                    <label><input type="checkbox" name="delivery_days[]" value="Thursday"> Thursday</label>
                    <label><input type="checkbox" name="delivery_days[]" value="Friday"> Friday</label>
                    <label><input type="checkbox" name="delivery_days[]" value="Saturday"> Saturday</label>
                    <label><input type="checkbox" name="delivery_days[]" value="Sunday"> Sunday</label>
                </div>
                @error('delivery_days')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Allergies (Optional)</label>
                <textarea name="allergies" class="w-full p-2 border rounded"></textarea>
                @error('allergies')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Subscribe Now</button>
        </form>
    </div>
</div>
@endsection
