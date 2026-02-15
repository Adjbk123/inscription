<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Inscription;

class TokenInscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $inscriptions = Inscription::whereNull('token')
            ->orWhere('token', '')
            ->get();

        if ($inscriptions->isEmpty()) {
            $this->command->info('Aucune inscription sans token trouvée.');
            return;
        }

        foreach ($inscriptions as $inscription) {
            $inscription->token = Str::random(64);
            $inscription->save();
        }

        $this->command->info('Tokens générés avec succès pour les inscriptions.');
    }
}
