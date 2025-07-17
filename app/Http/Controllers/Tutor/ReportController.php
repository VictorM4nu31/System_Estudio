<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Report;

class ReportController extends Controller
{
    public function index() {
        return response()->json(Report::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'month' => 'required|string',
            'content' => 'required|string',
        ]);
        $report = Report::create($validated);
        return response()->json(['message' => 'Reporte creado', 'report' => $report]);
    }
    public function show($id) {
        return response()->json(Report::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $report = Report::findOrFail($id);
        $validated = $request->validate([
            'month' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
        ]);
        $report->update($validated);
        return response()->json(['message' => 'Reporte actualizado', 'report' => $report]);
    }
    public function destroy($id) {
        $report = Report::findOrFail($id);
        $report->delete();
        return response()->json(['message' => 'Reporte eliminado']);
    }
}
