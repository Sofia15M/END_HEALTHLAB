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
        Schema::create('lab_m_orden_resultados', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->timestamp('fecha')->useCurrentOnUpdate()->useCurrent();
            $table->integer('id_orden')->index('fk_lab_m_orden_resultados_orden');
            $table->integer('id_procedimiento')->index('fk_lab_m_orden_resultados_procedimiento');
            $table->integer('id_prueba')->index('fk_lab_m_orden_resultados_prueba');
            $table->integer('id_pruebaopcion')->nullable()->index('fk_lab_m_orden_resultados_pruebaopcion');
            $table->string('res_opcion', 250)->nullable();
            $table->decimal('res_numerico', 16, 4)->nullable();
            $table->string('res_texto', 60)->nullable();
            $table->string('res_memo', 2500)->nullable();
            $table->integer('num_procesamientos')->nullable();
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_m_orden_resultados');
    }
};
