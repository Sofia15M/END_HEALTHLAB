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
        Schema::create('lab_p_procedimientos', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_cups')->index('fk_lab_p_procedimientos_cups');
            $table->integer('id_grupo_laboratorio')->index('fk_lab_p_procedimiento_grupos');
            $table->string('metodo', 60)->nullable();
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_p_procedimientos');
    }
};
