<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function manage() {
        $settings = config('app');
        return response()->json(['settings' => $settings]);
    }
    public function advanced(Request $request) {
        // Mock: solo retorna un mensaje, aquí podrías guardar en base de datos o archivo
        return response()->json(['message' => 'Configuración avanzada actualizada']);
    }
}
