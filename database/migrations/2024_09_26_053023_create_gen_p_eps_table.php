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
        Schema::create('gen_p_eps', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('codigo', 8);
            $table->string('razonsocial', 250);
            $table->string('nit', 20)->nullable();
            $table->boolean('habilita')->default(true);
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gen_p_eps');
    }
};
