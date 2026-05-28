<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livro_reserva', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('livro_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reserva_id')->constrained()->cascadeOnDelete();
            $table->integer('quantidade')->default(1);
            $table->timestamps();

            $table->unique(['livro_id', 'reserva_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livro_reserva');
    }
};
