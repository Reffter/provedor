<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $USER_SEED_QUANTITY = 15;
        $SEED_QUANTITY = 33;
        
        \App\Models\Utilizador::factory($USER_SEED_QUANTITY)->create();
        \App\Models\Solicitacao::factory($SEED_QUANTITY)->create();
        #\App\Models\Assunto::factory()->create();
    }
}
