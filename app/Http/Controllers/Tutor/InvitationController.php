<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Invitation;

class InvitationController extends Controller
{
    public function index() {
        $invitations = Invitation::all();
        // Vista: tutor/invitations/index (listado de invitaciones)
        return view('tutor.invitations.index', compact('invitations'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'tutor_id' => 'required|integer',
            'student_id' => 'required|integer',
            'status' => 'required|string',
            'accepted_at' => 'nullable|date',
        ]);
        $invitation = Invitation::create($validated);
        // Vista: tutor/invitations/show (detalle de invitación creada)
        return view('tutor.invitations.show', compact('invitation'));
    }
    public function show($id) {
        $invitation = Invitation::findOrFail($id);
        // Vista: tutor/invitations/show (detalle de invitación)
        return view('tutor.invitations.show', compact('invitation'));
    }
    public function update(Request $request, $id) {
        $invitation = Invitation::findOrFail($id);
        $validated = $request->validate([
            'status' => 'sometimes|required|string',
            'accepted_at' => 'nullable|date',
        ]);
        $invitation->update($validated);
        // Vista: tutor/invitations/show (detalle de invitación actualizada)
        return view('tutor.invitations.show', compact('invitation'));
    }
    public function destroy($id) {
        $invitation = Invitation::findOrFail($id);
        $invitation->delete();
        // Vista: tutor/invitations/index (listado tras eliminar)
        $invitations = Invitation::all();
        return view('tutor.invitations.index', compact('invitations'));
    }
}
