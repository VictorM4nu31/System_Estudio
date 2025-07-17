<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Profile;

class ProfileController extends Controller
{
    public function index() {
        $profiles = Profile::all();
        // Vista: tutor/profile/index (listado de perfiles)
        return view('tutor.profile.index', compact('profiles'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'data' => 'nullable|json',
        ]);
        $profile = Profile::create($validated);
        // Vista: tutor/profile/show (detalle de perfil creado)
        return view('tutor.profile.show', compact('profile'));
    }
    public function show($id) {
        $profile = Profile::findOrFail($id);
        // Vista: tutor/profile/show (detalle de perfil)
        return view('tutor.profile.show', compact('profile'));
    }
    public function update(Request $request, $id) {
        $profile = Profile::findOrFail($id);
        $validated = $request->validate([
            'data' => 'nullable|json',
        ]);
        $profile->update($validated);
        // Vista: tutor/profile/show (detalle de perfil actualizado)
        return view('tutor.profile.show', compact('profile'));
    }
    public function destroy($id) {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        // Vista: tutor/profile/index (listado tras eliminar)
        $profiles = Profile::all();
        return view('tutor.profile.index', compact('profiles'));
    }
}
