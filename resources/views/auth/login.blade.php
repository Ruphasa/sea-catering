@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-center mb-6">Login to SEA Catering</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700">Remember me</span>
                </label>
            </div>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Forgot your password?</a>
            @endif

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
            </div>
        </form>

        <p class="mt-4 text-center">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</div>
@endsection
