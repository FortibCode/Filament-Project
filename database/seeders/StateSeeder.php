<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprime les anciens états
        DB::table('states')->delete();

        // Vérifie que le pays United States existe
        $usa = DB::table('contries')->where('id', 223)->first();
        if (!$usa) {
            DB::table('contries')->insert([
                'id' => 223,
                'code' => 'US',
                'name' => 'United States',
                'phonecode' => 1
            ]);
        }

        // Tableau des 50 états américains
        $states = [
            'Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut',
            'Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa',
            'Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan',
            'Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire',
            'New Jersey','New Mexico','New York','North Carolina','North Dakota','Ohio',
            'Oklahoma','Oregon','Pennsylvania','Rhode Island','South Carolina','South Dakota',
            'Tennessee','Texas','Utah','Vermont','Virginia','Washington','West Virginia','Wisconsin','Wyoming'
        ];

        // Insérer tous les états liés au pays
        foreach ($states as $index => $stateName) {
            $stateId = $index + 1;
            $exists = DB::table('states')->where('id', $stateId)->first();
            if (!$exists) {
                DB::table('states')->insert([
                    'id' => $stateId,
                    'name' => $stateName,
                    'contry_id' => 223,
                ]);
            }
        }
    }
}
