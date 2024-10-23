@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6">My Contacts</h1>

    <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
        Add Contact
    </a>

    <div id="contacts-table">
        @include('contacts.table')
    </div>

    <input type="text" id="search-input" class="w-full p-2 border border-gray-300 rounded mt-4" placeholder="Search...">

    <script>
        const searchInput = document.getElementById('search-input');
        const contactsTable = document.getElementById('contacts-table');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value;

            fetch('/contacts/table?query=' + encodeURIComponent(searchTerm))
                .then(response => response.text())
                .then(html => {
                    contactsTable.innerHTML = html;
                });
        });
    </script>
</div>
@endsection