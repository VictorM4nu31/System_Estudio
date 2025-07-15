<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Event;

class EventController extends Controller
{
    public function index() {
        return response()->json(Event::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);
        $event = Event::create($validated);
        return response()->json(['message' => 'Evento creado', 'event' => $event]);
    }
    public function show($id) {
        return response()->json(Event::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'description' => 'nullable|string',
        ]);
        $event->update($validated);
        return response()->json(['message' => 'Evento actualizado', 'event' => $event]);
    }
    public function destroy($id) {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Evento eliminado']);
    }
}
