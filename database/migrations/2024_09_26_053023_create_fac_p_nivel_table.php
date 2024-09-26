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
        Schema::create('fac_p_nivel', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_eps')->index('fk_fac_p_nivel_eps');
            $table->string('nivel', 4);
            $table->string('nombre', 50);
            $table->integer('id_regimen')->index('fk_fac_p_nivel_listaopcion');
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fac_p_nivel');
    }
};
