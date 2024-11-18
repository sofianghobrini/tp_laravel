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
                $table->foreignId('eleve_id')->constrained()->onDelete('cascade');
                $table->foreignId('evaluation_id')->constrained()->onDelete('cascade');
                $table->double('note', 8, 2); // Note des élèves
                $table->timestamps();
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
