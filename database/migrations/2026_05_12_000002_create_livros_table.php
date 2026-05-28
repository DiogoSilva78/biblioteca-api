<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('livros', function (Blueprint $table): void {
            $table->id();
            $table->string('titulo');
            $table->string('isbn')->unique();
            $table->integer('ano_publicacao');
            $table->string('genero');
            $table->integer('exemplares_disponiveis')->default(1);
            $table->foreignId('autor_id')->constrained('autors')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
