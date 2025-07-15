<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Guild;

class GuildController extends Controller
{
    public function codes() {
        $guilds = Guild::all(['name', 'code']);
        return response()->json(['codes' => $guilds]);
    }
    public function create(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string|unique:guilds,code',
            'description' => 'nullable|string',
        ]);
        $guild = Guild::create($validated);
        return response()->json(['message' => 'Gremio creado', 'guild' => $guild]);
    }
    public function index() {
        $guilds = Guild::all();
        return response()->json(['guilds' => $guilds]);
    }
    public function update(Request $request, $id) {
        $guild = Guild::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'code' => 'sometimes|required|string|unique:guilds,code,'.$id,
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
