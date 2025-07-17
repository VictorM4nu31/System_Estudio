<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function all() {
        // Vista: admin/reports/index (listado de reportes)
        $reports = ['Reporte 1', 'Reporte 2'];
        return view('admin.reports.index', compact('reports'));
    }
    public function analytics() {
        // Vista: admin/reports/analytics (analíticas globales)
        $analytics = ['Usuarios activos' => 10, 'Misiones completadas' => 50];
        return view('admin.reports.analytics', compact('analytics'));
    }
    public function logs() {
        // Vista: admin/reports/logs (historial de acciones)
        $logs = ['Log 1', 'Log 2'];
        return view('admin.reports.logs', compact('logs'));
    }
}
