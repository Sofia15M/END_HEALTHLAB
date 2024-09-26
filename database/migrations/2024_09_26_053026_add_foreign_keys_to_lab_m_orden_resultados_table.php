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
        Schema::table('lab_m_orden_resultados', function (Blueprint $table) {
            $table->foreign(['id_orden'], 'fk_lab_m_orden_resultados_orden')->references(['id'])->on('lab_m_orden')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_procedimiento'], 'fk_lab_m_orden_resultados_procedimiento')->references(['id'])->on('lab_p_procedimientos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_prueba'], 'fk_lab_m_orden_resultados_prueba')->references(['id'])->on('lab_p_pruebas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_pruebaopcion'], 'fk_lab_m_orden_resultados_pruebaopcion')->references(['id'])->on('lab_p_pruebas_opciones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lab_m_orden_resultados', function (Blueprint $table) {
            $table->dropForeign('fk_lab_m_orden_resultados_orden');
            $table->dropForeign('fk_lab_m_orden_resultados_procedimiento');
            $table->dropForeign('fk_lab_m_orden_resultados_prueba');
            $table->dropForeign('fk_lab_m_orden_resultados_pruebaopcion');
        });
    }
};
