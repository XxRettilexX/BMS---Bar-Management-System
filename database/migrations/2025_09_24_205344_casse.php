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
        Schema::create('casse', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locale_id')->constrained('locali')->onDelete('cascade');
            $table->string('nome')->default('Cassa principale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
