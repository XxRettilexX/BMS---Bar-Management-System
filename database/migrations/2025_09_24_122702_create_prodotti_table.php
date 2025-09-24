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
        Schema::create('prodotti', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->text('descrizione')->nullable();
            $table->decimal('prezzo_acquisto', 10, 2);
            $table->decimal('prezzo_vendita', 10, 2)->nullable();
            $table->string('unita_misura', 20)->nullable(); // es. litri, kg, pezzi
            $table->foreignId('id_fornitore')->nullable()
                ->constrained('fornitori')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodotti');
    }
};
