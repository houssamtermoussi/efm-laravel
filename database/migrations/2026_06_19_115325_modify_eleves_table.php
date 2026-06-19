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
        Schema::table('eleves', function (Blueprint $table) {
            // Ajouter la colonne age
            $table->integer('age')->nullable()->after('prenom');

            // Supprimer la contrainte unique sur prenom
            $table->dropUnique(['prenom']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eleves', function (Blueprint $table) {
            // Remettre la contrainte unique sur prenom
            $table->unique('prenom');

            // Supprimer la colonne age
            $table->dropColumn('age');
        });
    }
};
