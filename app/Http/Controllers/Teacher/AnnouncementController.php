<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher\Announcement;
use App\Models\Teacher\Guild;

class AnnouncementController extends Controller
{
    public function index() {
        $announcements = Announcement::all();
        // Vista: teacher/announcements/index (listado de anuncios)
        return view('teacher.announcements.index', compact('announcements'));
    }

    public function create() {
        $guilds = Guild::all();
        // Vista: teacher/announcements/create (formulario de creación)
        return view('teacher.announcements.create', compact('guilds'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'guild_id' => 'required|integer',
        ]);

        // Agregar el teacher_id del usuario autenticado
        $validated['teacher_id'] = Auth::user()->teacher->id ?? 1;

        $announcement = Announcement::create($validated);
        // Vista: teacher/announcements/show (detalle de anuncio creado)
        return view('teacher.announcements.show', compact('announcement'));
    }

    public function show($id) {
        $announcement = Announcement::findOrFail($id);
        // Vista: teacher/announcements/show (detalle de anuncio)
        return view('teacher.announcements.show', compact('announcement'));
    }

    public function edit($id) {
        $announcement = Announcement::findOrFail($id);
        $guilds = Guild::all();
        // Vista: teacher/announcements/edit (formulario de edición)
        return view('teacher.announcements.edit', compact('announcement', 'guilds'));
    }

    public function update(Request $request, $id) {
        $announcement = Announcement::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
            'guild_id' => 'sometimes|required|integer',
        ]);
        $announcement->update($validated);
        // Vista: teacher/announcements/show (detalle de anuncio actualizado)
        return view('teacher.announcements.show', compact('announcement'));
    }

    public function destroy($id) {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        // Vista: teacher/announcements/index (listado tras eliminar)
        $announcements = Announcement::all();
        return view('teacher.announcements.index', compact('announcements'));
    }
}
