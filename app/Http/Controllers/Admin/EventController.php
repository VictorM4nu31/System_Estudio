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
        // Vista: admin/events/show (detalle de evento creado)
        return view('admin.events.show', compact('event'));
    }
    public function manage() {
        $events = Event::all();
        // Vista: admin/events/index (listado de eventos)
        return view('admin.events.index', compact('events'));
    }
    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'description' => 'nullable|string',
        ]);
        $event->update($validated);
        // Vista: admin/events/show (detalle de evento actualizado)
        return view('admin.events.show', compact('event'));
    }
    public function destroy($id) {
        $event = Event::findOrFail($id);
        $event->delete();
        // Vista: admin/events/index (listado tras eliminar)
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }
}
