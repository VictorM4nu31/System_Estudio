<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Announcement;

class AnnouncementController extends Controller
{
    public function index() {
        $announcements = Announcement::all();
        // Vista: teacher/announcements/index (listado de anuncios)
        return view('teacher.announcements.index', compact('announcements'));
    }

    public function create() {
        // Vista: teacher/announcements/create (formulario de creación)
        return view('teacher.announcements.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);
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
        // Vista: teacher/announcements/edit (formulario de edición)
        return view('teacher.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, $id) {
        $announcement = Announcement::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
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
