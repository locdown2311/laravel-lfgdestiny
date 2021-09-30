<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'tipo' => 'raid',
            'descricao' => 'Último Desejo',
        ]);
        Category::create([
            'tipo' => 'raid',
            'descricao' => 'Jardim da Salvação',
        ]);
        Category::create([
            'tipo' => 'raid',
            'descricao' => 'Cripta da Pedra',
        ]);
        Category::create([
            'tipo' => 'raid',
            'descricao' => 'Câmara de Cristal',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Assaltos',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Anoitecer',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Desafio Ascendente',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Caça aos Pesadelos',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Mensageiro',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Presságio',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Trono Estilhaçado',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Fosso da Heresia',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Profecia',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Poço Cego',
        ]);
        Category::create([
            'tipo' => 'pve',
            'descricao' => 'Artimanha',
        ]);
        Category::create([
            'tipo' => 'pvp',
            'descricao' => 'Jogo Rápido',
        ]);
        Category::create([
            'tipo' => 'pvp',
            'descricao' => 'Desafio de Osíris',
        ]);
        Category::create([
            'tipo' => 'diversos',
            'descricao' => 'Customizado',
        ]);
    }
}
