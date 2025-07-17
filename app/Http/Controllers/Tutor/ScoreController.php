<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Score;

class ScoreController extends Controller
{
    public function index() {
        $scores = Score::all();
        // Vista: tutor/scores/index (listado de puntajes)
        return view('tutor.scores.index', compact('scores'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'score' => 'required|integer',
            'progress' => 'required|integer',
            'grades' => 'nullable|json',
        ]);
        $score = Score::create($validated);
        // Vista: tutor/scores/show (detalle de puntaje creado)
        return view('tutor.scores.show', compact('score'));
    }
    public function show($id) {
        $score = Score::findOrFail($id);
        // Vista: tutor/scores/show (detalle de puntaje)
        return view('tutor.scores.show', compact('score'));
    }
    public function update(Request $request, $id) {
        $score = Score::findOrFail($id);
        $validated = $request->validate([
            'score' => 'sometimes|required|integer',
            'progress' => 'sometimes|required|integer',
            'grades' => 'nullable|json',
        ]);
        $score->update($validated);
        // Vista: tutor/scores/show (detalle de puntaje actualizado)
        return view('tutor.scores.show', compact('score'));
    }
    public function destroy($id) {
        $score = Score::findOrFail($id);
        $score->delete();
        // Vista: tutor/scores/index (listado tras eliminar)
        $scores = Score::all();
        return view('tutor.scores.index', compact('scores'));
    }
}
