<?php

namespace Database\Seeders;
use App\Models\Eleve;
use App\Models\Classe;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eleve::factory(20)->create();
    }
}
