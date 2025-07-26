<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher\Team;
use App\Models\Teacher\Guild;
use App\Models\Teacher\TeamMember;
use App\Models\User;

class TeamController extends Controller
{
    public function index() {
        $teams = Team::all();
        // Vista: teacher/teams/index (listado de equipos)
        return view('teacher.teams.index', compact('teams'));
    }

    public function create() {
        $guilds = Guild::all();
        $students = User::whereHas('roles', function($query) {
            $query->where('name', 'student');
        })->get();

        // Vista: teacher/teams/create (formulario de creación)
        return view('teacher.teams.create', compact('guilds', 'students'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'team_type' => 'required|string|in:proyecto,investigacion,competencia,estudio,otro',
            'max_members' => 'required|integer|min:2|max:20',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:activo,inactivo,completado,suspendido',
            'guild_id' => 'nullable|integer',
            'creation_method' => 'required|string|in:manual,random',
            'total_students' => 'nullable|integer|min:1',
            'teams_count' => 'nullable|integer|min:1',
        ]);

        // Agregar el teacher_id del usuario autenticado
        $validated['teacher_id'] = Auth::user()->teacher->id ?? 1;

        $team = Team::create($validated);

        // Si es creación aleatoria, generar los equipos
        if ($validated['creation_method'] === 'random') {
            $this->createRandomTeams($validated);
        }

        // Vista: teacher/teams/show (detalle de equipo creado)
        return view('teacher.teams.show', compact('team'));
    }

    public function show($id) {
        $team = Team::findOrFail($id);
        // Vista: teacher/teams/show (detalle de equipo)
        return view('teacher.teams.show', compact('team'));
    }

    public function edit($id) {
        $team = Team::findOrFail($id);
        // Vista: teacher/teams/edit (formulario de edición)
        return view('teacher.teams.edit', compact('team'));
    }

    public function update(Request $request, $id) {
        $team = Team::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'team_type' => 'sometimes|required|string|in:proyecto,investigacion,competencia,estudio,otro',
            'max_members' => 'sometimes|required|integer|min:2|max:20',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'sometimes|required|string|in:activo,inactivo,completado,suspendido',
        ]);

        $team->update($validated);
        // Vista: teacher/teams/show (detalle de equipo actualizado)
        return view('teacher.teams.show', compact('team'));
    }

    public function destroy($id) {
        $team = Team::findOrFail($id);
        $team->delete();
        // Vista: teacher/teams/index (listado tras eliminar)
        $teams = Team::all();
        return view('teacher.teams.index', compact('teams'));
    }

    private function createRandomTeams($data) {
        // Obtener estudiantes del gremio si se especifica
        $students = User::whereHas('roles', function($query) {
            $query->where('name', 'student');
        });

        if (!empty($data['guild_id'])) {
            $students = $students->whereHas('student', function($query) use ($data) {
                $query->where('guild_id', $data['guild_id']);
            });
        }

        $students = $students->get();
        $totalStudents = $students->count();

        if ($totalStudents === 0) {
            return;
        }

        $maxMembers = $data['max_members'];
        $teamsCount = $data['teams_count'] ?? ceil($totalStudents / $maxMembers);

        // Mezclar estudiantes aleatoriamente
        $shuffledStudents = $students->shuffle();

        // Crear equipos
        for ($i = 0; $i < $teamsCount; $i++) {
            $teamName = $data['name'] . ' - Equipo ' . ($i + 1);

            $team = Team::create([
                'name' => $teamName,
                'description' => $data['description'],
                'team_type' => $data['team_type'],
                'max_members' => $maxMembers,
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'status' => $data['status'],
                'guild_id' => $data['guild_id'],
                'teacher_id' => $data['teacher_id'],
            ]);

            // Asignar estudiantes al equipo
            $studentsForTeam = $shuffledStudents->take($maxMembers);
            foreach ($studentsForTeam as $student) {
                TeamMember::create([
                    'team_id' => $team->id,
                    'student_id' => $student->id,
                    'role' => 'member',
                ]);
            }

            // Remover estudiantes asignados
            $shuffledStudents = $shuffledStudents->slice($maxMembers);

            // Si no quedan estudiantes, salir
            if ($shuffledStudents->isEmpty()) {
                break;
            }
        }

        // Si quedan estudiantes, crear un equipo adicional
        if (!$shuffledStudents->isEmpty()) {
            $teamName = $data['name'] . ' - Equipo Final';

            $finalTeam = Team::create([
                'name' => $teamName,
                'description' => $data['description'],
                'team_type' => $data['team_type'],
                'max_members' => $maxMembers,
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'status' => $data['status'],
                'guild_id' => $data['guild_id'],
                'teacher_id' => $data['teacher_id'],
            ]);

            foreach ($shuffledStudents as $student) {
                TeamMember::create([
                    'team_id' => $finalTeam->id,
                    'student_id' => $student->id,
                    'role' => 'member',
                ]);
            }
        }
    }
}
