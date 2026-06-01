<?php

namespace Database\Seeders;
use App\Models\Classe;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classe::create(['nom' => 'A']);
        Classe::create(['nom' => 'B']);
        Classe::create(['nom' => 'C']);
        Classe::create(['nom' => 'D']);
        Classe::create(['nom' => 'E']);
    }
}
