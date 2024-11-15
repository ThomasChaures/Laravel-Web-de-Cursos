<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos_en_ordenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ordenes_id')->constrained()->onDelete('cascade');
            $table->foreignId('servicios_id')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos_en_ordenes');
    }
};
