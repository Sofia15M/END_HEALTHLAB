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
        Schema::table('lab_p_procedimientos', function (Blueprint $table) {
            $table->foreign(['id_cups'], 'fk_lab_p_procedimientos_cups')->references(['id'])->on('fac_p_cups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_grupo_laboratorio'], 'fk_lab_p_procedimiento_grupos')->references(['id'])->on('lab_p_grupos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lab_p_procedimientos', function (Blueprint $table) {
            $table->dropForeign('fk_lab_p_procedimientos_cups');
            $table->dropForeign('fk_lab_p_procedimiento_grupos');
        });
    }
};
