@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-center mb-6">Register for SEA Catering</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full p-2 border rounded">
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Register</button>
            </div>
        </form>

        <p class="mt-4 text-center">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
