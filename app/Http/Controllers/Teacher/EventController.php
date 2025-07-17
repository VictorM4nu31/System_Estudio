<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Event;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        // Vista: teacher/events/index (listado de eventos)
        return view('teacher.events.index', compact('events'));
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
        // Vista: teacher/events/show (detalle de evento creado)
        return view('teacher.events.show', compact('event'));
    }
    public function show($id) {
        $event = Event::findOrFail($id);
        // Vista: teacher/events/show (detalle de evento)
        return view('teacher.events.show', compact('event'));
    }
    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'description' => 'nullable|string',
        ]);
        $event->update($validated);
        // Vista: teacher/events/show (detalle de evento actualizado)
        return view('teacher.events.show', compact('event'));
    }
    public function destroy($id) {
        $event = Event::findOrFail($id);
        $event->delete();
        // Vista: teacher/events/index (listado tras eliminar)
        $events = Event::all();
        return view('teacher.events.index', compact('events'));
    }
}
