<style>
    .table-container {
        width: 100%;

        .thead {
            padding: 10px;
        }

        .no-contacts {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .table-data {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        
    }
</style>

<table class="table-container">
    <thead>
        <tr>
            <th class="thead">Name</th>
            <th class="thead">Company</th>
            <th class="thead">Email</th>
            <th class="thead">Phone</th>
            <th class="thead">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (count($contacts) === 0)
        <tr>
            <td class="no-contacts" colspan="5">No contacts found.</td>
        </tr>
        @endif

        @foreach ($contacts as $contact)
        <tr>
            <td class="table-data">{{ $contact->name }}</td>
            <td class="table-data">{{ $contact->company ?? '-' }}</td>
            <td class="table-data">{{ $contact->email ?? '-' }}</td>
            <td class="table-data">{{ $contact->phone  ?? '-' }}</td>
            <td class="table-data">
                <a href="{{ route('contacts.edit', $contact) }}" style="padding-right: 10px">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to DELETE?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $contacts->links('pagination::default') }}