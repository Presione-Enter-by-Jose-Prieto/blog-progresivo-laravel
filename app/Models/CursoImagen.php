<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoImagen extends Model
{
    use HasFactory;

    /**
     * Tabla asociada
     */
    protected $table = 'curso_imagenes';

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'curso_id',
        'titulo',
        'descripcion',
        'imagen',
    ];

    /**
     * Relación: una imagen pertenece a un curso (N:1)
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
