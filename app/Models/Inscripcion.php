<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    /**
     * Tabla asociada
     */
    protected $table = 'inscripciones';

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'curso_id',
        'estudiante_id',
        'estado',
    ];

    /**
     * Relación: una inscripción pertenece a un curso (N:1)
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    /**
     * Relación: una inscripción pertenece a un estudiante (N:1)
     */
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
