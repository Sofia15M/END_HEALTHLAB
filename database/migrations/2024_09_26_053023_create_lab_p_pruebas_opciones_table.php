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
        Schema::create('lab_p_pruebas_opciones', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_prueba')->index('fk_lab_p_pruebas_opciones');
            $table->string('opcion', 250);
            $table->decimal('valor_ref_min_f', 15)->nullable();
            $table->decimal('valor_ref_max_f', 15)->nullable();
            $table->decimal('valor_ref_min_m', 15)->nullable();
            $table->decimal('valor_ref_max_m', 15)->nullable();
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_p_pruebas_opciones');
    }
};
