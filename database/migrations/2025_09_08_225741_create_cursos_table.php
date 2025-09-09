<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->text('descripcion');
            $table->integer('duracion');
            $table->enum('nivel', ['Básico', 'Intermedio', 'Avanzado']);
            $table->enum('categoria', ['Deportivo', 'Pedagógico', 'Idiomas', 'Otros']);
            $table->enum('modalidad', ['En línea', 'Presencial', 'Mixto'])->nullable();
            $table->string('requisitos')->nullable();
            $table->string('metas')->nullable();
            $table->decimal('costo', 10, 2);
            $table->integer('cupo_maximo')->nullable();
            $table->boolean('activo')->default(false);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
