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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
                  $table->string('name');
            $table->string('numero');
            $table->string('email')->unique();

            // Relations
            $table->foreignId('departement_id')->constrained()->cascadeOnDelete();
            $table->foreignId('commune_id')->constrained()->cascadeOnDelete();
            $table->foreignId('specialite_id')->constrained()->cascadeOnDelete(); // <-- ajout spécialité

            $table->string('fichier');

            // Gestion par l’admin
            $table->enum('statut', ['en_attente', 'accepte', 'refuse'])->default('en_attente');

            // Disponibilité gérée par le formateur
            $table->boolean('disponible')->default(false);
            $table->string('token',64)->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
