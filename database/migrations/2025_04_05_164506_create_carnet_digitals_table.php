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
        Schema::create('carnet_digitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('tipo_usuario'); // 'aprendiz' o 'instructor'
            $table->string('nombre_completo');
            $table->string('ficha')->nullable(); // solo para aprendices
            $table->string('programa');
            $table->string('jornada');
            $table->string('foto')->nullable(); // ruta de la imagen
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carnet_digitals');
    }
};
