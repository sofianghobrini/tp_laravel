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
        if (!Schema::hasTable('evaluation_eleves')) {
            Schema::create('evaluation_eleves', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('eleve_id');
                $table->unsignedBigInteger('evaluation_id');
                $table->float('note')->nullable();
                $table->timestamps();

                // Vérifie l'existence des tables avant d'ajouter les clés étrangères
                if (Schema::hasTable('eleves')) {
                    $table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('cascade');
                }

                if (Schema::hasTable('evaluations')) {
                    $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_eleves');
    }
};
