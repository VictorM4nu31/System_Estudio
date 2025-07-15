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
        return response()->json(['message' => 'Insignia global creada', 'badge' => $badge]);
    }
    public function index() {
        $badges = Badge::all();
        return response()->json(['badges' => $badges]);
    }
    public function update(Request $request, $id) {
        $badge = Badge::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);
        $badge->update($validated);
        return response()->json(['message' => 'Insignia actualizada', 'badge' => $badge]);
    }
    public function destroy($id) {
        $badge = Badge::findOrFail($id);
        $badge->delete();
        return response()->json(['message' => 'Insignia eliminada']);
    }
}
