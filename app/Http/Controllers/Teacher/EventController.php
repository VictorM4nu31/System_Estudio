<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher\Event;
use App\Models\Teacher\Guild;

class EventController extends Controller
{
    public function index() {
        $events = Event::all();
        // Vista: teacher/events/index (listado de eventos)
        return view('teacher.events.index', compact('events'));
    }

    public function create() {
        $guilds = Guild::all();
        // Vista: teacher/events/create (formulario de creación)
        return view('teacher.events.create', compact('guilds'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'event_type' => 'required|string|in:taller,conferencia,competencia,exposicion,otro',
            'capacity' => 'nullable|integer|min:1',
            'guild_id' => 'nullable|integer',
            'recipient_type' => 'required|string|in:all,guild',
        ]);

        // Combinar fecha y hora si se proporcionan
        if ($request->has('date') && $request->has('time')) {
            $validated['date'] = $request->date . ' ' . $request->time;
        }

        // Validar que si se selecciona gremio, se proporcione guild_id
        if ($validated['recipient_type'] === 'guild' && empty($validated['guild_id'])) {
            return back()->withErrors(['guild_id' => 'Debes seleccionar un gremio cuando el destinatario es un gremio específico.'])->withInput();
        }

        // Si es para todos, establecer guild_id como null
        if ($validated['recipient_type'] === 'all') {
            $validated['guild_id'] = null;
        }

        // Agregar el teacher_id del usuario autenticado
        $validated['teacher_id'] = Auth::user()->teacher->id ?? 1;

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
        $guilds = Guild::all();
        // Vista: teacher/events/edit (formulario de edición)
        return view('teacher.events.edit', compact('event', 'guilds'));
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
            'guild_id' => 'nullable|integer',
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
