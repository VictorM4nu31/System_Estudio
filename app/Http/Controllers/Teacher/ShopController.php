<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher\Shop;
use App\Models\Teacher\Guild;

class ShopController extends Controller
{
    public function index() {
        $shops = Shop::all();
        // Vista: teacher/shops/index (listado de tiendas)
        return view('teacher.shops.index', compact('shops'));
    }

    public function create() {
        $guilds = Guild::all();
        // Vista: teacher/shops/create (formulario de creación)
        return view('teacher.shops.create', compact('guilds'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'guild_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        // Agregar el teacher_id del usuario autenticado
        $validated['teacher_id'] = Auth::user()->teacher->id ?? 1;

        $shop = Shop::create($validated);
        // Vista: teacher/shops/show (detalle de tienda creada)
        return view('teacher.shops.show', compact('shop'));
    }

    public function show($id) {
        $shop = Shop::findOrFail($id);
        // Vista: teacher/shops/show (detalle de tienda)
        return view('teacher.shops.show', compact('shop'));
    }

    public function edit($id) {
        $shop = Shop::findOrFail($id);
        $guilds = Guild::all();
        // Vista: teacher/shops/edit (formulario de edición)
        return view('teacher.shops.edit', compact('shop', 'guilds'));
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
