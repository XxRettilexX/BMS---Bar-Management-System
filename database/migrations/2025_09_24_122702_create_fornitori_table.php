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
        Schema::create('fornitori', function (Blueprint $table) {
            $table->id();
            $table->string('ragione_sociale', 150);
            $table->string('partita_iva', 20)->unique();
            $table->string('indirizzo', 255)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornitori');
    }
};
