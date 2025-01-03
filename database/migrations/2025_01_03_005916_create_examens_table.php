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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profesor_id')->constrained('profesores');
            $table->foreignId('materia_id')->constrained('materias');
            $table->foreignId('alumno_id')->constrained('alumnos');
            $table->string('CURP')->constrained('alumnos');
            $table->string('matricula')->constrained('alumnos');
            $table->string('examen_estatus');
            $table->string('examen_tipo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};
