<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Inscription;
use Database\Seeders\CommuneSeeder;
use Database\Seeders\DepartementSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🔹 Seed des localisations
        $this->call([
            DepartementSeeder::class,
            CommuneSeeder::class,
            TokenInscriptionSeeder::class, // ajoute le seeder des tokens
        ]);

       
    }
}
