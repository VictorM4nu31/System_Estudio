<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function all() {
        return response()->json(['reports' => ['Reporte 1', 'Reporte 2']]);
    }
    public function analytics() {
        return response()->json(['analytics' => ['Usuarios activos' => 10, 'Misiones completadas' => 50]]);
    }
    public function logs() {
        return response()->json(['logs' => ['Log 1', 'Log 2']]);
    }
}
