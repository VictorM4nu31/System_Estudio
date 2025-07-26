<?php

namespace App\Livewire\Settings;

use App\Models\Teacher\Guild;
use App\Models\Tutor\Invitation;
use App\Mail\TutorInvitationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class StudentProfile extends Component
{
    public string $guild_code = '';
    public string $matricula = '';
    public string $numero_lista = '';
    public string $level = '';
    public string $points = '';
    public string $tutor_email = '';
    public bool $tutor_invitation_sent = false;

    public function mount(): void
    {
        // Cargar datos del estudiante si existe
        if (Auth::user()->student) {
            $this->level = Auth::user()->student->level ?? '';
            $this->points = Auth::user()->student->points ?? '0';
            $this->matricula = Auth::user()->student->matricula ?? '';
            $this->numero_lista = Auth::user()->student->numero_lista ?? '';
            if (Auth::user()->student->guild) {
                $this->guild_code = Auth::user()->student->guild->code ?? '';
            }
        }

        // Verificar si ya se envió una invitación al tutor
        $this->tutor_invitation_sent = Invitation::where('student_id', Auth::id())
            ->where('correo_tutor', $this->tutor_email)
            ->where('status', 'pendiente')
            ->exists();
    }

    public function sendTutorInvitation(): void
    {
        $this->validate([
            'tutor_email' => ['required', 'email', 'max:255'],
        ]);

        // Verificar si ya existe una invitación pendiente para este tutor
        $existingInvitation = Invitation::where('student_id', Auth::id())
            ->where('correo_tutor', $this->tutor_email)
            ->where('status', 'pendiente')
            ->first();

        if ($existingInvitation) {
            $this->dispatch('notify', [
                'type' => 'info',
                'message' => 'Ya existe una invitación pendiente para este correo.'
            ]);
            return;
        }

        // Crear nueva invitación
        $invitation = Invitation::create([
            'token' => Str::random(64),
            'tutor_id' => 1, // ID por defecto, se actualizará cuando el tutor se registre
            'student_id' => Auth::id(),
            'correo_tutor' => $this->tutor_email,
            'status' => 'pendiente',
        ]);

        // Enviar email de invitación
        try {
            $enlace = route('tutor.invitation.accept', ['token' => $invitation->token]);
            $alumno = Auth::user()->name;
            
            Mail::to($this->tutor_email)->send(new TutorInvitationMail($enlace, $alumno));
            
            $this->tutor_invitation_sent = true;
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Invitación enviada al tutor correctamente.'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Error al enviar la invitación. Intenta nuevamente.'
            ]);
        }
    }

    public function updateProfile(): void
    {
        $validated = $this->validate([
            'guild_code' => ['nullable', 'string', 'max:255'],
            'matricula' => ['nullable', 'string', 'max:255'],
            'numero_lista' => ['nullable', 'integer', 'min:1'],
        ]);

        // Actualizar o crear datos del estudiante
        if (!Auth::user()->student) {
            Auth::user()->student()->create([
                'student_id' => Auth::id(),
                'level' => $this->level ?: 1,
                'points' => $this->points ?: 0,
                'matricula' => $this->matricula,
                'numero_lista' => $this->numero_lista,
            ]);
        } else {
            Auth::user()->student->update([
                'level' => $this->level ?: 1,
                'points' => $this->points ?: 0,
                'matricula' => $this->matricula,
                'numero_lista' => $this->numero_lista,
            ]);
        }

        // Asignar gremio si se proporciona código
        if ($this->guild_code) {
            $guild = Guild::where('code', $this->guild_code)->first();
            if ($guild) {
                Auth::user()->student->update(['guild_id' => $guild->id]);
                $this->dispatch('notify', [
                    'type' => 'success',
                    'message' => 'Código de gremio válido. Has sido asignado al gremio: ' . $guild->name
                ]);
            } else {
                $this->dispatch('notify', [
                    'type' => 'error',
                    'message' => 'Código de gremio inválido. Verifica el código e intenta nuevamente.'
                ]);
            }
        }

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Perfil actualizado correctamente.'
        ]);
    }

    public function render()
    {
        return view('livewire.settings.student-profile');
    }
}
