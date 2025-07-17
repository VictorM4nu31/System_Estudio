<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Reward;

class RewardController extends Controller
{
    public function index() {
        return response()->json(Reward::all());
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
        return response()->json(['message' => 'Recompensa creada', 'reward' => $reward]);
    }
    public function show($id) {
        return response()->json(Reward::findOrFail($id));
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
        return response()->json(['message' => 'Recompensa actualizada', 'reward' => $reward]);
    }
    public function destroy($id) {
        $reward = Reward::findOrFail($id);
        $reward->delete();
        return response()->json(['message' => 'Recompensa eliminada']);
    }
}
