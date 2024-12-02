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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id(); // ID de l'élève
            $table->string('name'); // Nom de l'élève
            $table->string('prénom'); // Prénom de l'élève
            $table->date('date_naissance');
            $table->string('numéro_étudiant')->unique();
            $table->string('email')->unique();
            $table->string('image');
            $table->timestamps(); // Horodatage
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
