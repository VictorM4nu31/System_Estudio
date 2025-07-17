<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Guild;

class GuildController extends Controller
{
    public function index() {
        return response()->json(Guild::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'name' => 'required|string',
            'code' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $guild = Guild::create($validated);
        return response()->json(['message' => 'Gremio creado', 'guild' => $guild]);
    }
    public function show($id) {
        return response()->json(Guild::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $guild = Guild::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'code' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);
        $guild->update($validated);
        return response()->json(['message' => 'Gremio actualizado', 'guild' => $guild]);
    }
    public function destroy($id) {
        $guild = Guild::findOrFail($id);
        $guild->delete();
        return response()->json(['message' => 'Gremio eliminado']);
    }
}
