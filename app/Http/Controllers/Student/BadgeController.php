<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Badge;

class BadgeController extends Controller
{
    public function index() {
        $badges = Badge::all();
        // Vista: student/badges/index (listado de insignias)
        return view('student.badges.index', compact('badges'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'student_id' => 'required|integer',
            'unlocked' => 'required|boolean',
        ]);
        $badge = Badge::create($validated);
        // Vista: student/badges/show (detalle de insignia creada)
        return view('student.badges.show', compact('badge'));
    }
    public function show($id) {
        $badge = Badge::findOrFail($id);
        // Vista: student/badges/show (detalle de insignia)
        return view('student.badges.show', compact('badge'));
    }
    public function update(Request $request, $id) {
        $badge = Badge::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'unlocked' => 'sometimes|required|boolean',
        ]);
        $badge->update($validated);
        // Vista: student/badges/show (detalle de insignia actualizada)
        return view('student.badges.show', compact('badge'));
    }
    public function destroy($id) {
        $badge = Badge::findOrFail($id);
        $badge->delete();
        // Vista: student/badges/index (listado tras eliminar)
        $badges = Badge::all();
        return view('student.badges.index', compact('badges'));
    }
}
