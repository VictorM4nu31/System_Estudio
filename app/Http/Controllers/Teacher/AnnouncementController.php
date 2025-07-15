<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Announcement;

class AnnouncementController extends Controller
{
    public function index() {
        return response()->json(Announcement::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
        ]);
        $announcement = Announcement::create($validated);
        return response()->json(['message' => 'Anuncio creado', 'announcement' => $announcement]);
    }
    public function show($id) {
        return response()->json(Announcement::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $announcement = Announcement::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
        ]);
        $announcement->update($validated);
        return response()->json(['message' => 'Anuncio actualizado', 'announcement' => $announcement]);
    }
    public function destroy($id) {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return response()->json(['message' => 'Anuncio eliminado']);
    }
}
