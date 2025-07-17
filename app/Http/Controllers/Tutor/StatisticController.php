<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Statistic;

class StatisticController extends Controller
{
    public function index() {
        $statistics = Statistic::all();
        // Vista: tutor/statistics/index (listado de estadísticas)
        return view('tutor.statistics.index', compact('statistics'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'data' => 'nullable|json',
        ]);
        $statistic = Statistic::create($validated);
        // Vista: tutor/statistics/show (detalle de estadística creada)
        return view('tutor.statistics.show', compact('statistic'));
    }
    public function show($id) {
        $statistic = Statistic::findOrFail($id);
        // Vista: tutor/statistics/show (detalle de estadística)
        return view('tutor.statistics.show', compact('statistic'));
    }
    public function update(Request $request, $id) {
        $statistic = Statistic::findOrFail($id);
        $validated = $request->validate([
            'data' => 'nullable|json',
        ]);
        $statistic->update($validated);
        // Vista: tutor/statistics/show (detalle de estadística actualizada)
        return view('tutor.statistics.show', compact('statistic'));
    }
    public function destroy($id) {
        $statistic = Statistic::findOrFail($id);
        $statistic->delete();
        // Vista: tutor/statistics/index (listado tras eliminar)
        $statistics = Statistic::all();
        return view('tutor.statistics.index', compact('statistics'));
    }
}
