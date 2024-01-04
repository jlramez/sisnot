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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->string('tipoods_id');
            $table->integer('noexp');
            $table->integer('actor');
            $table->integer('demandado');
            $table->date('estados_id');
            $table->date('areas_id');
            $table->date('empleados_id');
            $table->date('fecha_registro');
            $table->date('estatus');
            $table->date('observaciones');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
