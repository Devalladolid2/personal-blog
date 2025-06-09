<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración.
     *
     * Crea la tabla 'articles' con los campos necesarios para almacenar artículos.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();                          // Clave primaria autoincremental
            $table->string('title');              // Título del artículo
            $table->text('content');              // Contenido del artículo
            $table->date('published_at');         // Fecha de publicación
        });
    }

    /**
     * Revierte la migración.
     *
     * Elimina la tabla 'articles' si existe.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
