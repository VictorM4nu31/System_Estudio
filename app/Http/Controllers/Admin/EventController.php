<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Event;

class EventController extends Controller
{
    public function create(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);
        $event = Event::create($validated);
        return response()->json(['message' => 'Evento creado', 'event' => $event]);
    }
    public function manage() {
        $events = Event::all();
        return response()->json(['events' => $events]);
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
