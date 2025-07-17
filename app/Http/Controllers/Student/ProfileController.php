<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Profile;

class ProfileController extends Controller
{
    public function index() {
        $profiles = Profile::all();
        // Vista: student/profile/index (listado de perfiles)
        return view('student.profile.index', compact('profiles'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'avatar' => 'nullable|string',
            'level' => 'required|integer',
            'experience' => 'required|integer',
            'title' => 'nullable|string',
            'customization' => 'nullable|json',
        ]);
        $profile = Profile::create($validated);
        // Vista: student/profile/show (detalle de perfil creado)
        return view('student.profile.show', compact('profile'));
    }
    public function show($id) {
        $profile = Profile::findOrFail($id);
        // Vista: student/profile/show (detalle de perfil)
        return view('student.profile.show', compact('profile'));
    }
    public function update(Request $request, $id) {
        $profile = Profile::findOrFail($id);
        $validated = $request->validate([
            'avatar' => 'nullable|string',
            'level' => 'sometimes|required|integer',
            'experience' => 'sometimes|required|integer',
            'title' => 'nullable|string',
            'customization' => 'nullable|json',
        ]);
        $profile->update($validated);
        // Vista: student/profile/show (detalle de perfil actualizado)
        return view('student.profile.show', compact('profile'));
    }
    public function destroy($id) {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        // Vista: student/profile/index (listado tras eliminar)
        $profiles = Profile::all();
        return view('student.profile.index', compact('profiles'));
    }
}
