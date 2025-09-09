<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Para login
use Illuminate\Notifications\Notifiable;

class Estudiante extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Tabla asociada
     */
    protected $table = 'estudiantes';

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'curso_academico_id',
        'acudiente',
        'password',
    ];

    /**
     * Campos ocultos (no se devuelven en JSON)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relación: un estudiante pertenece a un curso académico (N:1)
     */
    public function cursoAcademico()
    {
        return $this->belongsTo(CursoAcademico::class);
    }

    /**
     * Relación: un estudiante puede tener varias inscripciones (1:N)
     */
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    /**
     * Relación: acceso directo a los cursos a través de las inscripciones (N:M)
     */
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'inscripciones');
    }
}
