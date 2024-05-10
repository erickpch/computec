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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('telefono');
            $table->string('direccion');
            $table->string('profesion');

            $table->unsignedBigInteger('id_horario');
            $table->foreign('id_horario')->references('id')->on('horarios')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      
      
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
