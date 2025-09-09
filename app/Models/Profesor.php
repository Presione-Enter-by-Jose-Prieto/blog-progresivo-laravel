<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Para login
use Illuminate\Notifications\Notifiable;

class Profesor extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Tabla asociada
     */
    protected $table = 'profesores';

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'foto',
        'email',
        'telefono',
        'direccion',
        'especialidad',
        'password',
        'titular',
    ];

    /**
     * Campos ocultos (no se devuelven en JSON)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relación: un profesor puede dictar varios cursos (N:M)
     */
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_profesor');
    }

    /**
     * Relación: un profesor puede ser titular de un curso académico (1:1)
     */
    public function cursoAcademicoTitular()
    {
        return $this->hasOne(CursoAcademico::class, 'titular_id');
    }
}
