<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    public function run(): void
    {
        $saramago = Autor::where('nome', 'Jose Saramago')->firstOrFail();
        $pessoa = Autor::where('nome', 'Fernando Pessoa')->firstOrFail();
        $eca = Autor::where('nome', 'Eca de Queiros')->firstOrFail();

        $livros = [
            [
                'titulo' => 'Ensaio sobre a Cegueira',
                'isbn' => '9789720046716',
                'ano_publicacao' => 1995,
                'genero' => 'Romance',
                'exemplares_disponiveis' => 4,
                'autor_id' => $saramago->id,
            ],
            [
                'titulo' => 'O Ano da Morte de Ricardo Reis',
                'isbn' => '9789720046723',
                'ano_publicacao' => 1984,
                'genero' => 'Romance',
                'exemplares_disponiveis' => 3,
                'autor_id' => $saramago->id,
            ],
            [
                'titulo' => 'Livro do Desassossego',
                'isbn' => '9789720046730',
                'ano_publicacao' => 1982,
                'genero' => 'Poesia',
                'exemplares_disponiveis' => 2,
                'autor_id' => $pessoa->id,
            ],
            [
                'titulo' => 'Os Maias',
                'isbn' => '9789720046747',
                'ano_publicacao' => 1888,
                'genero' => 'Romance',
                'exemplares_disponiveis' => 5,
                'autor_id' => $eca->id,
            ],
        ];

        foreach ($livros as $livro) {
            Livro::updateOrCreate(['isbn' => $livro['isbn']], $livro);
        }
    }
}
