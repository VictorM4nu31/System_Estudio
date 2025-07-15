<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ModerationController extends Controller
{
    public function manage() {
        return response()->json(['moderation' => ['Reporte de mal comportamiento 1', 'Reporte de mal comportamiento 2']]);
    }
}
