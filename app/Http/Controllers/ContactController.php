<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $contacts = Auth::user()->contacts()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    public function list(Request $request)
    {
        $searchTerm = $request->input('query', null);
        $page = $request->input('page', 1);

        $contacts = Auth::user()->contacts()
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%")
                    ->orWhere('company', 'like', "%{$searchTerm}%")
                    ->orWhere('phone', 'like', "%{$searchTerm}%");
            })
            ->paginate(10, ['*'], 'page', $page);

        return response()->json($contacts);
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email:rfc,dns|max:255',
        ]);

        ray($request->all());

        Auth::user()->contacts()->create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Contact added successfully');
    }

    public function edit(Contact $contact)
    {
        $this->authorize('update-contact', $contact);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $this->authorize('update-contact', $contact);
        $contact->update($request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email:rfc,dns|max:255',
        ]));

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete-contact', $contact);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }
}
