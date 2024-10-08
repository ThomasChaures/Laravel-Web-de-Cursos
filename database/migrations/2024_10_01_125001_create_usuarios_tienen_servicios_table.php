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
        Schema::create('usuarios_tienen_servicios', function (Blueprint $table) {
            $table->id();
            // Asigno la clave foranea para la tabla 'users'
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Asigno la clave foranea para la tabla 'servicios'
            $table->foreignId('service_id')->constrained('servicios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_tienen_servicios');
    }
};
