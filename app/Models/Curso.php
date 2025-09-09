<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Curso extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar masivamente
     */
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'duracion',
        'nivel',
        'categoria',
        'modalidad',
        'requisitos',
        'metas',
        'costo',
        'cupo_maximo',
        'activo',
        'fecha_inicio',
        'fecha_fin',
    ];

    /**
     * Generar el slug automáticamente a partir del nombre
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($curso) {
            $curso->slug = Str::slug($curso->nombre, '-');
        });

        static::updating(function ($curso) {
            $curso->slug = Str::slug($curso->nombre, '-');
        });
    }

    /**
     * Relación: un curso puede tener varios profesores (N:M)
     */
    public function profesores()
    {
        return $this->belongsToMany(Profesor::class, 'curso_profesor');
    }

    /**
     * Relación: un curso puede tener muchas imágenes (1:N)
     */
    public function imagenes()
    {
        return $this->hasMany(CursoImagen::class);
    }

    /**
     * Relación: un curso puede tener muchas inscripciones (1:N)
     */
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    /**
     * Acceso directo a estudiantes mediante las inscripciones
     */
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'inscripciones');
    }
}
