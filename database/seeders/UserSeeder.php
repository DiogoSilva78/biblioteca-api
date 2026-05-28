<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@biblioteca.pt'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ],
        );

        User::updateOrCreate(
            ['email' => 'joao@exemplo.pt'],
            [
                'name' => 'Joao Leitor',
                'password' => Hash::make('leitor123'),
                'role' => 'leitor',
            ],
        );

        User::updateOrCreate(
            ['email' => 'ana@exemplo.pt'],
            [
                'name' => 'Ana Silva',
                'password' => Hash::make('leitor123'),
                'role' => 'leitor',
            ],
        );
    }
}
