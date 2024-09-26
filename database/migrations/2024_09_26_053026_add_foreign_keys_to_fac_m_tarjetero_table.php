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
        Schema::table('fac_m_tarjetero', function (Blueprint $table) {
            $table->foreign(['id_persona'], 'fac_m_tarjetero_ibfk_1')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_eps'], 'fk_fac_m_tarjetero_eps')->references(['id'])->on('gen_p_eps')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_regimen'], 'fk_fac_m_tarjetero_listaopcion')->references(['id'])->on('gen_p_listaopcion')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_nivel'], 'fk_fac_m_tarjetero_nivel')->references(['id'])->on('fac_p_nivel')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_persona'], 'fk_fac_m_tarjetero_users')->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fac_m_tarjetero', function (Blueprint $table) {
            $table->dropForeign('fac_m_tarjetero_ibfk_1');
            $table->dropForeign('fk_fac_m_tarjetero_eps');
            $table->dropForeign('fk_fac_m_tarjetero_listaopcion');
            $table->dropForeign('fk_fac_m_tarjetero_nivel');
            $table->dropForeign('fk_fac_m_tarjetero_users');
        });
    }
};
