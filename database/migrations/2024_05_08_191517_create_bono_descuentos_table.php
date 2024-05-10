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
        Schema::create('bono_descuentos', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_boleta');
            $table->foreign('id_boleta')->references('id')->on('boleta_de_pagos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bono_descuentos');
    }
};
