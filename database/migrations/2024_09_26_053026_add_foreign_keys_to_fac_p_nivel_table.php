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
        Schema::table('fac_p_nivel', function (Blueprint $table) {
            $table->foreign(['id_eps'], 'fk_fac_p_nivel_eps')->references(['id'])->on('gen_p_eps')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['id_regimen'], 'fk_fac_p_nivel_listaopcion')->references(['id'])->on('gen_p_listaopcion')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fac_p_nivel', function (Blueprint $table) {
            $table->dropForeign('fk_fac_p_nivel_eps');
            $table->dropForeign('fk_fac_p_nivel_listaopcion');
        });
    }
};
