<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ModerationController extends Controller
{
    public function manage() {
        // Vista: admin/moderation/index (gestión de reportes de mal comportamiento)
        $reports = ['Reporte de mal comportamiento 1', 'Reporte de mal comportamiento 2'];
        return view('admin.moderation.index', compact('reports'));
    }
}
