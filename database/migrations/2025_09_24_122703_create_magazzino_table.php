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
        Schema::create('magazzino', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_prodotto')
                ->constrained('prodotti')
                ->cascadeOnDelete();
            $table->decimal('quantita', 10, 2)->default(0);
            $table->decimal('minimo_scorta', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magazzino');
    }
};
