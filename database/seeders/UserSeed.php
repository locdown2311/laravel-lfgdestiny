<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'LocElMito#7576',
            'email' => 'igor2396@outlook.com',
            'password' => Hash::make('Igorcg23')
        ]);
        User::factory()->create([
            'name' => 'Banido#1234',
            'email' => 'banido@outlook.com',
            'password' => Hash::make('Igorcg23')
        ]);

    }
}
