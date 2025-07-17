<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Reward;

class RewardController extends Controller
{
    public function index() {
        $rewards = Reward::all();
        // Vista: student/rewards/index (listado de recompensas)
        return view('student.rewards.index', compact('rewards'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'cost' => 'required|integer',
            'student_id' => 'required|integer',
            'redeemed' => 'required|boolean',
        ]);
        $reward = Reward::create($validated);
        // Vista: student/rewards/show (detalle de recompensa creada)
        return view('student.rewards.show', compact('reward'));
    }
    public function show($id) {
        $reward = Reward::findOrFail($id);
        // Vista: student/rewards/show (detalle de recompensa)
        return view('student.rewards.show', compact('reward'));
    }
    public function update(Request $request, $id) {
        $reward = Reward::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'cost' => 'sometimes|required|integer',
            'redeemed' => 'sometimes|required|boolean',
        ]);
        $reward->update($validated);
        // Vista: student/rewards/show (detalle de recompensa actualizada)
        return view('student.rewards.show', compact('reward'));
    }
    public function destroy($id) {
        $reward = Reward::findOrFail($id);
        $reward->delete();
        // Vista: student/rewards/index (listado tras eliminar)
        $rewards = Reward::all();
        return view('student.rewards.index', compact('rewards'));
    }
}
