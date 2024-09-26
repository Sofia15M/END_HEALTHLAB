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
        Schema::create('lab_m_orden', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_documento')->nullable()->index('fk_fac_p_nivel_documento');
            $table->decimal('orden', 10, 0);
            $table->timestamp('fecha')->useCurrentOnUpdate()->useCurrent();
            $table->integer('id_historia')->nullable()->index('fk_fac_p_nivel_historia');
            $table->integer('id_profesional_ordena')->nullable()->index('fk_fac_p_nivel_profecional');
            $table->boolean('profesional_externo')->default(false);
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_m_orden');
    }
};
