<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Statistic;

class StatisticController extends Controller
{
    public function index() {
        return response()->json(Statistic::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'data' => 'nullable|json',
        ]);
        $statistic = Statistic::create($validated);
        return response()->json(['message' => 'Estadística creada', 'statistic' => $statistic]);
    }
    public function show($id) {
        return response()->json(Statistic::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $statistic = Statistic::findOrFail($id);
        $validated = $request->validate([
            'data' => 'nullable|json',
        ]);
        $statistic->update($validated);
        return response()->json(['message' => 'Estadística actualizada', 'statistic' => $statistic]);
    }
    public function destroy($id) {
        $statistic = Statistic::findOrFail($id);
        $statistic->delete();
        return response()->json(['message' => 'Estadística eliminada']);
    }
}
