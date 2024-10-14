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
        schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('sintomas');
            $table->string('descripcion');
            $table->string('tipo_consulta');
            $table->string('fecha');
            $table->string('receta');
            $table->string('estado');
            $table->timestamps();
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
