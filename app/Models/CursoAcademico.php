<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoAcademico extends Model
{
    use HasFactory;

    /**
     * Tabla asociada
     */
    protected $table = 'cursos_academicos';

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'nombre',
        'titular_id',
        'activo',
    ];

    /**
     * Relación: un curso académico puede tener muchos estudiantes (1:N)
     */
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    /**
     * Relación: un curso académico tiene un profesor titular (N:1)
     */
    public function titular()
    {
        return $this->belongsTo(Profesor::class, 'titular_id');
    }
}
