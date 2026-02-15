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
        Schema::create('specialites', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();               // Formateur, Chauffeur, Maintenancier
            $table->longText('description_piece'); 
             $table->longText('experience'); 
            $table->enum('statut', ['visible', 'invisible'])->default('visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialites');
    }
};
