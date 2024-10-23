@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-6">Register</h1>

    @if (session('status'))
        <div class="bg-green-500 text-white p-3 mb-4">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div>
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div>
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div>
            <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border border-gray-300 rounded mt-1" required>
        </div>
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Register</button>
        </div>
    </form>
</div>
@endsection