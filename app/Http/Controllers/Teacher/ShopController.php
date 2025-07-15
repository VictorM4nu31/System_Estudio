<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Shop;

class ShopController extends Controller
{
    public function index() {
        return response()->json(Shop::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        $shop = Shop::create($validated);
        return response()->json(['message' => 'Tienda creada', 'shop' => $shop]);
    }
    public function show($id) {
        return response()->json(Shop::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $shop = Shop::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);
        $shop->update($validated);
        return response()->json(['message' => 'Tienda actualizada', 'shop' => $shop]);
    }
    public function destroy($id) {
        $shop = Shop::findOrFail($id);
        $shop->delete();
        return response()->json(['message' => 'Tienda eliminada']);
    }
}
