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
}
