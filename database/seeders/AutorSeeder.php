<?php

namespace Database\Seeders;

use App\Models\Autor;
use Illuminate\Database\Seeder;

class AutorSeeder extends Seeder
{
    public function run(): void
    {
        $autores = [
            [
                'nome' => 'Jose Saramago',
                'nacionalidade' => 'Portuguesa',
                'data_nascimento' => '1922-11-16',
                'biografia' => 'Escritor portugues distinguido com o Premio Nobel da Literatura.',
            ],
            [
                'nome' => 'Fernando Pessoa',
                'nacionalidade' => 'Portuguesa',
                'data_nascimento' => '1888-06-13',
                'biografia' => 'Poeta modernista portugues conhecido pelos seus heteronimos.',
            ],
            [
                'nome' => 'Eca de Queiros',
                'nacionalidade' => 'Portuguesa',
                'data_nascimento' => '1845-11-25',
                'biografia' => 'Romancista portugues associado ao realismo.',
            ],
        ];

        foreach ($autores as $autor) {
            Autor::updateOrCreate(['nome' => $autor['nome']], $autor);
        }
    }
}
