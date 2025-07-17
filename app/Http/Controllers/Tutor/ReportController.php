<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Report;

class ReportController extends Controller
{
    public function index() {
        $reports = Report::all();
        // Vista: tutor/reports/index (listado de reportes)
        return view('tutor.reports.index', compact('reports'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'month' => 'required|string',
            'content' => 'required|string',
        ]);
        $report = Report::create($validated);
        // Vista: tutor/reports/show (detalle de reporte creado)
        return view('tutor.reports.show', compact('report'));
    }
    public function show($id) {
        $report = Report::findOrFail($id);
        // Vista: tutor/reports/show (detalle de reporte)
        return view('tutor.reports.show', compact('report'));
    }
    public function update(Request $request, $id) {
        $report = Report::findOrFail($id);
        $validated = $request->validate([
            'month' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
        ]);
        $report->update($validated);
        // Vista: tutor/reports/show (detalle de reporte actualizado)
        return view('tutor.reports.show', compact('report'));
    }
    public function destroy($id) {
        $report = Report::findOrFail($id);
        $report->delete();
        // Vista: tutor/reports/index (listado tras eliminar)
        $reports = Report::all();
        return view('tutor.reports.index', compact('reports'));
    }
}
