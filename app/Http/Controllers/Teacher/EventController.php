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

    public function create() {
        // Vista: teacher/events/create (formulario de creación)
        return view('teacher.events.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'event_type' => 'required|string|in:taller,conferencia,competencia,exposicion,otro',
            'capacity' => 'nullable|integer|min:1',
        ]);

        // Combinar fecha y hora si se proporcionan
        if ($request->has('date') && $request->has('time')) {
            $validated['date'] = $request->date . ' ' . $request->time;
        }

        $event = Event::create($validated);
        // Vista: teacher/events/show (detalle de evento creado)
        return view('teacher.events.show', compact('event'));
    }

    public function show($id) {
        $event = Event::findOrFail($id);
        // Vista: teacher/events/show (detalle de evento)
        return view('teacher.events.show', compact('event'));
    }

    public function edit($id) {
        $event = Event::findOrFail($id);
        // Vista: teacher/events/edit (formulario de edición)
        return view('teacher.events.edit', compact('event'));
    }

    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'sometimes|required|date',
            'location' => 'nullable|string|max:255',
            'event_type' => 'sometimes|required|string|in:taller,conferencia,competencia,exposicion,otro',
            'capacity' => 'nullable|integer|min:1',
        ]);

        // Combinar fecha y hora si se proporcionan
        if ($request->has('date') && $request->has('time')) {
            $validated['date'] = $request->date . ' ' . $request->time;
        }

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
