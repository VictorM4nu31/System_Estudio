<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Score;

class ScoreController extends Controller
{
    public function index() {
        return response()->json(Score::all());
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
        return response()->json(['message' => 'Puntaje creado', 'score' => $score]);
    }
    public function show($id) {
        return response()->json(Score::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $score = Score::findOrFail($id);
        $validated = $request->validate([
            'score' => 'sometimes|required|integer',
            'progress' => 'sometimes|required|integer',
            'grades' => 'nullable|json',
        ]);
        $score->update($validated);
        return response()->json(['message' => 'Puntaje actualizado', 'score' => $score]);
    }
    public function destroy($id) {
        $score = Score::findOrFail($id);
        $score->delete();
        return response()->json(['message' => 'Puntaje eliminado']);
    }
}
