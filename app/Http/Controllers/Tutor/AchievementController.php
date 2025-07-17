<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Achievement;

class AchievementController extends Controller
{
    public function index() {
        $achievements = Achievement::all();
        // Vista: tutor/achievements/index (listado de logros)
        return view('tutor.achievements.index', compact('achievements'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'unlocked' => 'required|boolean',
        ]);
        $achievement = Achievement::create($validated);
        // Vista: tutor/achievements/show (detalle de logro creado)
        return view('tutor.achievements.show', compact('achievement'));
    }
    public function show($id) {
        $achievement = Achievement::findOrFail($id);
        // Vista: tutor/achievements/show (detalle de logro)
        return view('tutor.achievements.show', compact('achievement'));
    }
    public function update(Request $request, $id) {
        $achievement = Achievement::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'unlocked' => 'sometimes|required|boolean',
        ]);
        $achievement->update($validated);
        // Vista: tutor/achievements/show (detalle de logro actualizado)
        return view('tutor.achievements.show', compact('achievement'));
    }
    public function destroy($id) {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        // Vista: tutor/achievements/index (listado tras eliminar)
        $achievements = Achievement::all();
        return view('tutor.achievements.index', compact('achievements'));
    }
}
