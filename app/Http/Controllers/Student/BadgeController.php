<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Badge;

class BadgeController extends Controller
{
    public function index() {
        return response()->json(Badge::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'student_id' => 'required|integer',
            'unlocked' => 'required|boolean',
        ]);
        $badge = Badge::create($validated);
        return response()->json(['message' => 'Insignia creada', 'badge' => $badge]);
    }
    public function show($id) {
        return response()->json(Badge::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $badge = Badge::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'unlocked' => 'sometimes|required|boolean',
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
