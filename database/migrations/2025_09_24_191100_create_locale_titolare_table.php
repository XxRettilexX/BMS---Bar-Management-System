<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locale_titolare', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utente_id')->constrained('utenti')->cascadeOnDelete();
            $table->foreignId('locale_id')->constrained('locali')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locale_titolare');
    }
};
