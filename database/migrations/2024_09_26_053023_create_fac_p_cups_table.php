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
        Schema::create('fac_p_cups', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('codigo', 8);
            $table->string('nombre', 500);
            $table->boolean('habilita')->nullable()->default(true);
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fac_p_cups');
    }
};
