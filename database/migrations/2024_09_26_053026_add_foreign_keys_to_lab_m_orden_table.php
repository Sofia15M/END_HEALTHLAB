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
        Schema::table('lab_m_orden', function (Blueprint $table) {
            $table->foreign(['id_documento'], 'fk_fac_p_nivel_documento')->references(['id'])->on('gen_p_documento')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_historia'], 'fk_fac_p_nivel_historia')->references(['id'])->on('fac_m_tarjetero')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_profesional_ordena'], 'fk_fac_p_nivel_profecional')->references(['id'])->on('fac_p_profesional')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lab_m_orden', function (Blueprint $table) {
            $table->dropForeign('fk_fac_p_nivel_documento');
            $table->dropForeign('fk_fac_p_nivel_historia');
            $table->dropForeign('fk_fac_p_nivel_profecional');
        });
    }
};
