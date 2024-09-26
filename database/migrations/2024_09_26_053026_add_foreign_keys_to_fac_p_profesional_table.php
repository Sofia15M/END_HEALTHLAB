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
        Schema::table('fac_p_profesional', function (Blueprint $table) {
            $table->foreign(['id_persona'], 'fac_p_profesional_ibfk_1')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['id_tipo_prof'], 'fk_fac_p_profesional_tipo')->references(['id'])->on('gen_p_listaopcion')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fac_p_profesional', function (Blueprint $table) {
            $table->dropForeign('fac_p_profesional_ibfk_1');
            $table->dropForeign('fk_fac_p_profesional_tipo');
        });
    }
};
