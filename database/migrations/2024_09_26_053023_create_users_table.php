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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_tipoid')->index('fk_users_tipo');
            $table->string('numeroid', 20);
            $table->string('apellido1', 20);
            $table->string('apellido2', 20);
            $table->string('nombre1', 20);
            $table->string('nombre2', 20);
            $table->date('fechanac')->nullable();
            $table->integer('id_sexobiologico')->nullable()->index('fk_users_sexobiologico');
            $table->string('direccion', 250)->nullable();
            $table->string('tel_movil', 10)->nullable();
            $table->string('email', 250)->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->dateTime('two_factor_confirmed_at')->nullable();
            $table->rememberToken();
            $table->integer('current_team_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('last_update')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
