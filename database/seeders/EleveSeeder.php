<?php

namespace Database\Seeders;
use App\Models\Eleve;
use App\Models\Classe;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Eleve::insert([
            [
                'nom' => 'Ali',
                'prenom' => 'Ahmed',
                'age' => 18,
                'classe' => '2A',
            ],
            [
                'nom' => 'Sara',
                'prenom' => 'Benali',
                'age' => 17,
                'classe' => '1A',
            ],
        ]);
}
}
