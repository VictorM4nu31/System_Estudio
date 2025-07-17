<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Badge;

class BadgeController extends Controller
{
    public function create(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $badge = Badge::create($validated);
        // Vista: admin/badges/show (detalle de insignia creada)
        return view('admin.badges.show', compact('badge'));
    }
    public function index() {
        $badges = Badge::all();
        // Vista: admin/badges/index (listado de insignias)
        return view('admin.badges.index', compact('badges'));
    }
    public function update(Request $request, $id) {
        $badge = Badge::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);
        $badge->update($validated);
        // Vista: admin/badges/show (detalle de insignia actualizada)
        return view('admin.badges.show', compact('badge'));
    }
    public function destroy($id) {
        $badge = Badge::findOrFail($id);
        $badge->delete();
        // Vista: admin/badges/index (listado tras eliminar)
        $badges = Badge::all();
        return view('admin.badges.index', compact('badges'));
    }
}
