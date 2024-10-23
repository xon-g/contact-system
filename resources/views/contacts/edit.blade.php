@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h1 class="text-3xl font-bold text-center mb-6">Edit Contact</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ $contact->name }}" required>
        </div>
        <div>
            <label for="company" class="block text-gray-700">Company</label>
            <input type="text" name="company" id="company" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ $contact->company }}" required>
        </div>
        <div>
            <label for="phone" class="block text-gray-700">Phone</label>
            <input type="text" name="phone" id="phone" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ $contact->phone }}" required>
        </div>
        <div>
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ $contact->email }}" required>
        </div>
        <div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Update Contact</button>
        </div>
    </form>
</div>
@endsection