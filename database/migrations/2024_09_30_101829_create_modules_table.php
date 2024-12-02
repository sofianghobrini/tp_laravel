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
        if (!Schema::hasTable('modules')) {
            Schema::create('modules', function (Blueprint $table) {
                $table->id(); // ID unique pour chaque évaluation
                $table->string('titre'); // Titre de l'évaluation
                $table->date('date'); // Date de l'évaluation
                $table->float('coefficient'); // Coefficient de l'évaluation
                $table->timestamps(); // Horodatage (created_at et updated_at)
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
