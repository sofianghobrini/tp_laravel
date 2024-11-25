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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade'); // Relation avec les modules
            $table->unsignedBigInteger('eleve_id');
            $table->foreignId('eleve_id')->constrained('eleves')->onDelete('cascade');
            $table->date('date');         // Date de l'évaluation
            $table->string('titre');      // Titre de l'évaluation
            $table->float('coefficient'); // Coefficient de l'évaluation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
