<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Guild;

class GuildController extends Controller
{
    public function index() {
        $guilds = Guild::all();
        // Vista: tutor/guilds/index (listado de gremios)
        return view('tutor.guilds.index', compact('guilds'));
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
        // Vista: tutor/guilds/show (detalle de gremio creado)
        return view('tutor.guilds.show', compact('guild'));
    }
    public function show($id) {
        $guild = Guild::findOrFail($id);
        // Vista: tutor/guilds/show (detalle de gremio)
        return view('tutor.guilds.show', compact('guild'));
    }
    public function update(Request $request, $id) {
        $guild = Guild::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'code' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);
        $guild->update($validated);
        // Vista: tutor/guilds/show (detalle de gremio actualizado)
        return view('tutor.guilds.show', compact('guild'));
    }
    public function destroy($id) {
        $guild = Guild::findOrFail($id);
        $guild->delete();
        // Vista: tutor/guilds/index (listado tras eliminar)
        $guilds = Guild::all();
        return view('tutor.guilds.index', compact('guilds'));
    }
}
