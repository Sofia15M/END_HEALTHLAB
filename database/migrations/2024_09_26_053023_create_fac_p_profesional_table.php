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
        Schema::create('fac_p_profesional', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('codigo', 4);
            $table->integer('id_persona')->nullable()->index('id_persona');
            $table->string('registro_medico', 20)->nullable();
            $table->integer('id_tipo_prof')->nullable()->index('fk_fac_p_profesional_tipo');
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fac_p_profesional');
    }
};
