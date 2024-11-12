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
        //
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('user');
            $table->string('falla');
            $table->string('Detalles');
            $table->string('Estado');
            $table->integer('Usuario_resuelto');
            $table->integer('urgencia');
            $table->string('foto');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('update_at')->useCurrent();
            $table->timestamp('fecha_resuelto');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};