<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Guild;

class GuildController extends Controller
{
    public function index() {
        $guilds = Guild::all();
        // Vista: teacher/guilds/index (listado de gremios)
        return view('teacher.guilds.index', compact('guilds'));
    }

    public function create() {
        // Vista: teacher/guilds/create (formulario de creación)
        return view('teacher.guilds.create');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string|unique:teacher_guilds,code',
            'description' => 'nullable|string',
            'teacher_id' => 'required|integer',
        ]);
        $guild = Guild::create($validated);
        // Vista: teacher/guilds/show (detalle de gremio creado)
        return view('teacher.guilds.show', compact('guild'));
    }
    public function show($id) {
        $guild = Guild::findOrFail($id);
        // Vista: teacher/guilds/show (detalle de gremio)
        return view('teacher.guilds.show', compact('guild'));
    }

    public function edit($id) {
        $guild = Guild::findOrFail($id);
        // Vista: teacher/guilds/edit (formulario de edición)
        return view('teacher.guilds.edit', compact('guild'));
    }
    public function update(Request $request, $id) {
        $guild = Guild::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'code' => 'sometimes|required|string|unique:teacher_guilds,code,'.$id,
            'description' => 'nullable|string',
        ]);
        $guild->update($validated);
        // Vista: teacher/guilds/show (detalle de gremio actualizado)
        return view('teacher.guilds.show', compact('guild'));
    }
    public function destroy($id) {
        $guild = Guild::findOrFail($id);
        $guild->delete();
        // Vista: teacher/guilds/index (listado tras eliminar)
        $guilds = Guild::all();
        return view('teacher.guilds.index', compact('guilds'));
    }
}
