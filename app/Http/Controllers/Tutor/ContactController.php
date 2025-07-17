<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Contact;

class ContactController extends Controller
{
    public function index() {
        return response()->json(Contact::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'tutor_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'student_id' => 'required|integer',
            'message' => 'required|string',
            'sent_at' => 'nullable|date',
        ]);
        $contact = Contact::create($validated);
        return response()->json(['message' => 'Mensaje enviado al docente', 'contact' => $contact]);
    }
    public function show($id) {
        return response()->json(Contact::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);
        $validated = $request->validate([
            'message' => 'sometimes|required|string',
            'sent_at' => 'nullable|date',
        ]);
        $contact->update($validated);
        return response()->json(['message' => 'Mensaje actualizado', 'contact' => $contact]);
    }
    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json(['message' => 'Mensaje eliminado']);
    }
}
