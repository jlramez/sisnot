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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('noexp');
            $table->string('descripcion');
            $table->integer('tipos_id');
            $table->integer('actuaciones_id');
            $table->integer('actuarios_id');
            $table->date('fecha_inicial');
            $table->date('fecha_asignacion');
            $table->date('fecha_notificacion');
            $table->date('fecha_limite');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('expedientes');
    }
};
