<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Reward;
use App\Models\Teacher\Guild;
use App\Models\Teacher\Shop;

class RewardController extends Controller
{
    public function index() {
        $rewards = Reward::all();
        // Vista: teacher/rewards/index (listado de recompensas)
        return view('teacher.rewards.index', compact('rewards'));
    }

    public function create() {
        $guilds = Guild::all();
        $shops = Shop::all();
        // Vista: teacher/rewards/create (formulario de creación)
        return view('teacher.rewards.create', compact('guilds', 'shops'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'shop_id' => 'required|integer',
            'guild_id' => 'required|integer',
            'description' => 'nullable|string',
            'cost' => 'required|integer',
        ]);
        $reward = Reward::create($validated);
        // Vista: teacher/rewards/show (detalle de recompensa creada)
        return view('teacher.rewards.show', compact('reward'));
    }

    public function show($id) {
        $reward = Reward::findOrFail($id);
        // Vista: teacher/rewards/show (detalle de recompensa)
        return view('teacher.rewards.show', compact('reward'));
    }

    public function edit($id) {
        $reward = Reward::findOrFail($id);
        $guilds = Guild::all();
        $shops = Shop::all();
        // Vista: teacher/rewards/edit (formulario de edición)
        return view('teacher.rewards.edit', compact('reward', 'guilds', 'shops'));
    }

    public function update(Request $request, $id) {
        $reward = Reward::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'cost' => 'sometimes|required|integer',
        ]);
        $reward->update($validated);
        // Vista: teacher/rewards/show (detalle de recompensa actualizada)
        return view('teacher.rewards.show', compact('reward'));
    }

    public function destroy($id) {
        $reward = Reward::findOrFail($id);
        $reward->delete();
        // Vista: teacher/rewards/index (listado tras eliminar)
        $rewards = Reward::all();
        return view('teacher.rewards.index', compact('rewards'));
    }
}
