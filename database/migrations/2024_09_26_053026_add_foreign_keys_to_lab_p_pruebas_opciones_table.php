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
        Schema::table('lab_p_pruebas_opciones', function (Blueprint $table) {
            $table->foreign(['id_prueba'], 'fk_lab_p_pruebas_opciones')->references(['id'])->on('lab_p_pruebas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lab_p_pruebas_opciones', function (Blueprint $table) {
            $table->dropForeign('fk_lab_p_pruebas_opciones');
        });
    }
};
