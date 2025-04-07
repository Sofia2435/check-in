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
        Schema::create('programaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nombre_asignatura'); // <-- Este campo no tiene valor por defecto y es obligatorio
            $table->string('descripcion')->nullable();
            $table->string('ficha');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('ambiente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programaciones');
    }
};
