<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Invitation;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function index() {
        $invitations = Invitation::all();
        // Vista: tutor/invitations/index (listado de invitaciones)
        return view('tutor.invitations.index', compact('invitations'));
    }

    public function accept($token) {
        $invitation = Invitation::where('token', $token)->first();
        
        if (!$invitation) {
            return redirect()->route('home')->with('error', 'Invitación inválida o expirada.');
        }

        if ($invitation->status !== 'pendiente') {
            return redirect()->route('home')->with('error', 'Esta invitación ya ha sido procesada.');
        }

        // Si el usuario está autenticado, actualizar la invitación
        if (Auth::check()) {
            $invitation->update([
                'tutor_id' => Auth::id(),
                'status' => 'aceptada',
                'accepted_at' => now(),
            ]);

            return redirect()->route('dashboard')->with('success', 'Invitación aceptada correctamente.');
        }

        // Si no está autenticado, redirigir al registro con el token
        return redirect()->route('register', ['invitation_token' => $token]);
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
