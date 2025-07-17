<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Shop;

class ShopController extends Controller
{
    public function index() {
        $shops = Shop::all();
        // Vista: teacher/shops/index (listado de tiendas)
        return view('teacher.shops.index', compact('shops'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        $shop = Shop::create($validated);
        // Vista: teacher/shops/show (detalle de tienda creada)
        return view('teacher.shops.show', compact('shop'));
    }
    public function show($id) {
        $shop = Shop::findOrFail($id);
        // Vista: teacher/shops/show (detalle de tienda)
        return view('teacher.shops.show', compact('shop'));
    }
    public function update(Request $request, $id) {
        $shop = Shop::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);
        $shop->update($validated);
        // Vista: teacher/shops/show (detalle de tienda actualizada)
        return view('teacher.shops.show', compact('shop'));
    }
    public function destroy($id) {
        $shop = Shop::findOrFail($id);
        $shop->delete();
        // Vista: teacher/shops/index (listado tras eliminar)
        $shops = Shop::all();
        return view('teacher.shops.index', compact('shops'));
    }
}
