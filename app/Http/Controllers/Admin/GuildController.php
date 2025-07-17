<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Guild;

class GuildController extends Controller
{
    public function codes() {
        $guilds = Guild::all(['name', 'code']);
        // Vista: admin/guilds/codes (listado de códigos de gremios)
        return view('admin.guilds.codes', compact('guilds'));
    }
    public function create(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'code' => 'required|string|unique:guilds,code',
            'description' => 'nullable|string',
        ]);
        $guild = Guild::create($validated);
        // Vista: admin/guilds/show (detalle de gremio creado)
        return view('admin.guilds.show', compact('guild'));
    }
    public function index() {
        $guilds = Guild::all();
        // Vista: admin/guilds/index (listado de gremios)
        return view('admin.guilds.index', compact('guilds'));
    }
    public function update(Request $request, $id) {
        $guild = Guild::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'code' => 'sometimes|required|string|unique:guilds,code,'.$id,
            'description' => 'nullable|string',
        ]);
        $guild->update($validated);
        // Vista: admin/guilds/show (detalle de gremio actualizado)
        return view('admin.guilds.show', compact('guild'));
    }
    public function destroy($id) {
        $guild = Guild::findOrFail($id);
        $guild->delete();
        // Vista: admin/guilds/index (listado tras eliminar)
        $guilds = Guild::all();
        return view('admin.guilds.index', compact('guilds'));
    }
}
