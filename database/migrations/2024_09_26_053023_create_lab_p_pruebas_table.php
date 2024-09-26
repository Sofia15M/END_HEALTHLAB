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
        Schema::create('lab_p_pruebas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_procedimiento');
            $table->string('codigo_prueba', 6);
            $table->string('nombre_prueba', 200);
            $table->integer('id_tipo_resultado');
            $table->string('unidad', 20);
            $table->boolean('habilita')->nullable()->default(true);
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_p_pruebas');
    }
};
