<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Invitation;

class InvitationController extends Controller
{
    public function index() {
        return response()->json(Invitation::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'tutor_id' => 'required|integer',
            'student_id' => 'required|integer',
            'status' => 'required|string',
            'accepted_at' => 'nullable|date',
        ]);
        $invitation = Invitation::create($validated);
        return response()->json(['message' => 'Invitación creada', 'invitation' => $invitation]);
    }
    public function show($id) {
        return response()->json(Invitation::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $invitation = Invitation::findOrFail($id);
        $validated = $request->validate([
            'status' => 'sometimes|required|string',
            'accepted_at' => 'nullable|date',
        ]);
        $invitation->update($validated);
        return response()->json(['message' => 'Invitación actualizada', 'invitation' => $invitation]);
    }
    public function destroy($id) {
        $invitation = Invitation::findOrFail($id);
        $invitation->delete();
        return response()->json(['message' => 'Invitación eliminada']);
    }
}
