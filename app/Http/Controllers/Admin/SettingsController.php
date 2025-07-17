<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function manage() {
        // Vista: admin/settings (gestión general de configuración)
        $settings = config('app');
        return view('admin.settings', compact('settings'));
    }
    public function advanced(Request $request) {
        // Vista: admin/settings/advanced (configuración avanzada)
        return view('admin.settings.advanced');
    }
}
