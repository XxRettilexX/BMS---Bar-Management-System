<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locale_dipendente', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locale_id')->constrained('locali')->cascadeOnDelete();
            $table->foreignId('utente_id')->constrained('utenti')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locale_dipendente');
    }
};
