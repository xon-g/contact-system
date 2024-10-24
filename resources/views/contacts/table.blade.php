<table class="min-w-full bg-white mt-6">
    <thead>
        <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Company</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Phone</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (count($contacts) === 0)
        <tr>
            <td class="border px-4 py-2 text-center" colspan="5">No contacts found.</td>
        </tr>
        @endif

        @foreach ($contacts as $contact)
        <tr>
            <td class="border px-4 py-2">{{ $contact->name  }}</td>
            <td class="border px-4 py-2">{{ $contact->company }}</td>
            <td class="border px-4 py-2">{{ $contact->email }}</td>
            <td class="border px-4 py-2">{{ $contact->phone }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('contacts.edit', $contact) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $contacts->links('pagination::default') }}