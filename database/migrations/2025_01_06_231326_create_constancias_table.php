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
        Schema::create('constancias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('CURP')->constrained('alumnos');
            $table->string('matricula')->constrained('alumnos');
            $table->string('constancia_tipo');
            $table->string('constancia_estatus');
            $table->binary('constancia_archivo_foto');
            $table->binary('constancia_archivo_resivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('constancias');
    }
};
