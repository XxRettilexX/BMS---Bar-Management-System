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
        Schema::create('chiusure_cassa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utente')
                ->constrained('utenti')
                ->cascadeOnDelete();
            $table->decimal('fondo_cassa', 10, 2)->default(0);
            $table->decimal('scarico_contante', 10, 2)->default(0);
            $table->decimal('spese', 10, 2)->default(0);
            $table->decimal('chiusura_pos', 10, 2)->default(0);
            $table->decimal('totale_finale', 10, 2)->default(0); // calcolato da backend
            $table->timestamp('data_chiusura')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chiusure_cassa');
    }
};
