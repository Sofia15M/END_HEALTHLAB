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
        Schema::create('fac_m_tarjetero', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('historia', 20);
            $table->integer('id_persona')->index('fk_fac_m_tarjetero_users');
            $table->integer('id_regimen')->index('fk_fac_m_tarjetero_listaopcion');
            $table->integer('id_eps')->nullable()->index('fk_fac_m_tarjetero_eps');
            $table->integer('id_nivel')->nullable()->index('fk_fac_m_tarjetero_nivel');
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fac_m_tarjetero');
    }
};
