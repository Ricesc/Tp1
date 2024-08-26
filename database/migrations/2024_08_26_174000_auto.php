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
        schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->integer('anio')->nullable();
            $table->string('color', 30);
            $table->decimal('precio', 10, 2)->nullable();
            $table->boolean('activo')->default(true);
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
