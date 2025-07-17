<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Inventory;

class InventoryController extends Controller
{
    public function index() {
        return response()->json(Inventory::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'item' => 'required|string',
            'quantity' => 'required|integer',
        ]);
        $inventory = Inventory::create($validated);
        return response()->json(['message' => 'Item agregado al inventario', 'inventory' => $inventory]);
    }
    public function show($id) {
        return response()->json(Inventory::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $inventory = Inventory::findOrFail($id);
        $validated = $request->validate([
            'item' => 'sometimes|required|string',
            'quantity' => 'sometimes|required|integer',
        ]);
        $inventory->update($validated);
        return response()->json(['message' => 'Inventario actualizado', 'inventory' => $inventory]);
    }
    public function destroy($id) {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return response()->json(['message' => 'Item eliminado del inventario']);
    }
}
