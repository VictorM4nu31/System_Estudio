<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Inventory;

class InventoryController extends Controller
{
    public function index() {
        $inventories = Inventory::all();
        // Vista: student/inventory/index (listado de inventario)
        return view('student.inventory.index', compact('inventories'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'item' => 'required|string',
            'quantity' => 'required|integer',
        ]);
        $inventory = Inventory::create($validated);
        // Vista: student/inventory/show (detalle de item agregado)
        return view('student.inventory.show', compact('inventory'));
    }
    public function show($id) {
        $inventory = Inventory::findOrFail($id);
        // Vista: student/inventory/show (detalle de item)
        return view('student.inventory.show', compact('inventory'));
    }
    public function update(Request $request, $id) {
        $inventory = Inventory::findOrFail($id);
        $validated = $request->validate([
            'item' => 'sometimes|required|string',
            'quantity' => 'sometimes|required|integer',
        ]);
        $inventory->update($validated);
        // Vista: student/inventory/show (detalle de item actualizado)
        return view('student.inventory.show', compact('inventory'));
    }
    public function destroy($id) {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        // Vista: student/inventory/index (listado tras eliminar)
        $inventories = Inventory::all();
        return view('student.inventory.index', compact('inventories'));
    }
}
