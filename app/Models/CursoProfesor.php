<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoProfesor extends Model
{
    use HasFactory;

    /**
     * Tabla asociada
     */
    protected $table = 'curso_profesor';

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'curso_id',
        'profesor_id',
    ];

    /**
     * Relación: este registro pertenece a un curso
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    /**
     * Relación: este registro pertenece a un profesor
     */
    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
}
