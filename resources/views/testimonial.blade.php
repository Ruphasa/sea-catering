@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Customer Testimonials</h1>

    <!-- Testimonial Slider -->
    <div class="relative w-full overflow-hidden mb-10">
        <div class="flex animate-scroll space-x-6" style="animation: scroll 20s linear infinite;">
            <div class="bg-white p-6 rounded-lg shadow w-1/3 flex-shrink-0">
                <p class="text-gray-700">"Makanannya enak dan sehat, sangat membantu diet saya!" - Ani, Jakarta</p>
                <p class="text-blue-500 mt-2">Rating: ★★★★☆ (4/5)</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow w-1/3 flex-shrink-0">
                <p class="text-gray-700">"Pelayanan cepat, makanan selalu segar!" - Budi, Surabaya</p>
                <p class="text-blue-500 mt-2">Rating: ★★★★★ (5/5)</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow w-1/3 flex-shrink-0">
                <p class="text-gray-700">"Opsinya sangat fleksibel, cocok untuk keluarga!" - Citra, Bandung</p>
                <p class="text-blue-500 mt-2">Rating: ★★★★☆ (4/5)</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow w-1/3 flex-shrink-0">
                <p class="text-gray-700">"Makanannya enak dan sehat, sangat membantu diet saya!" - Ani, Jakarta</p>
                <p class="text-blue-500 mt-2">Rating: ★★★★☆ (4/5)</p>
            </div>
        </div>
    </div>
    <style>
        .animate-scroll {
            display: flex;
            width: 100%;
        }
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>

    <!-- Testimonial Form -->
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-blue-600 mb-4">Share Your Experience</h2>
        <form method="POST" action="{{ route('testimonials') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Customer Name</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Review Message</label>
                <textarea name="review" class="w-full p-2 border rounded" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Rating</label>
                <select name="rating" class="w-full p-2 border rounded" required>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
</div>
@endsection
