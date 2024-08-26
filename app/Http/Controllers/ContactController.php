<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $contact = Contact::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'value' => $request->value,
        ]);

        return response()->json($contact, 201);
    }

    public function update(Request $request, Contact $contact)
    {
       
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(null, 204);
    }
}
