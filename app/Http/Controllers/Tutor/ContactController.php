<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Contact;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        // Vista: tutor/contact/index (listado de mensajes de contacto)
        return view('tutor.contact.index', compact('contacts'));
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
        // Vista: tutor/contact/show (detalle de mensaje enviado)
        return view('tutor.contact.show', compact('contact'));
    }
    public function show($id) {
        $contact = Contact::findOrFail($id);
        // Vista: tutor/contact/show (detalle de mensaje)
        return view('tutor.contact.show', compact('contact'));
    }
    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);
        $validated = $request->validate([
            'message' => 'sometimes|required|string',
            'sent_at' => 'nullable|date',
        ]);
        $contact->update($validated);
        // Vista: tutor/contact/show (detalle de mensaje actualizado)
        return view('tutor.contact.show', compact('contact'));
    }
    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        // Vista: tutor/contact/index (listado tras eliminar)
        $contacts = Contact::all();
        return view('tutor.contact.index', compact('contacts'));
    }
}
