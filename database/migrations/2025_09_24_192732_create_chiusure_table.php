<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chiusure', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locale_id')->constrained('locali')->cascadeOnDelete();
            $table->foreignId('utente_id')->constrained('utenti')->cascadeOnDelete();
            $table->float('scarico_contante')->default(0);
            $table->float('fondo_cassa')->default(0);
            $table->float('spese')->default(0);
            $table->float('chiusura_pos')->default(0);
            $table->dateTime('data_chiusura');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chiusure');
    }
};
