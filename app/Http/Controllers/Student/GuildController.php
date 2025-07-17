<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Guild;

class GuildController extends Controller
{
    public function index() {
        $guilds = Guild::all();
        // Vista: student/guilds/index (listado de gremios)
        return view('student.guilds.index', compact('guilds'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'description' => 'nullable|string',
            'student_id' => 'required|integer',
            'joined_at' => 'nullable|date',
        ]);
        $guild = Guild::create($validated);
        // Vista: student/guilds/show (detalle de gremio creado)
        return view('student.guilds.show', compact('guild'));
    }
    public function show($id) {
        $guild = Guild::findOrFail($id);
        // Vista: student/guilds/show (detalle de gremio)
        return view('student.guilds.show', compact('guild'));
    }
    public function update(Request $request, $id) {
        $guild = Guild::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'code' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'joined_at' => 'nullable|date',
        ]);
        $guild->update($validated);
        // Vista: student/guilds/show (detalle de gremio actualizado)
        return view('student.guilds.show', compact('guild'));
    }
    public function destroy($id) {
        $guild = Guild::findOrFail($id);
        $guild->delete();
        // Vista: student/guilds/index (listado tras eliminar)
        $guilds = Guild::all();
        return view('student.guilds.index', compact('guilds'));
    }
}
