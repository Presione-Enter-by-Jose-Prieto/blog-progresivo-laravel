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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_academico_id');

            // Datos básicos
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro'])->nullable();
            $table->string('direccion')->nullable();
            $table->string('foto')->nullable();

            // Identificación
            $table->string('tipo_documento')->nullable();
            $table->string('documento')->nullable()->unique();

            // Acudiente
            $table->string('nombre_acudiente')->nullable();
            $table->string('telefono_acudiente')->nullable();
            $table->string('email_acudiente')->nullable();

            $table->text('observaciones')->nullable();
            $table->boolean('activo')->default(true);

            $table->timestamps();

            $table->foreign('curso_academico_id')->references('id')->on('cursos_academicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
