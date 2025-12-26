<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        // Supprimer les anciennes villes
        DB::table('cities')->delete();

        /**
         * Villes par État
         * clé = state.name
         */
        $citiesByState = [

            // 🇺🇸 United States
            'New York' => [
                'New York City','Buffalo','Rochester',
                'Albany','Syracuse','Yonkers','Ithaca',
                'Poughkeepsie','Schenectady'
            ],

            'California' => [
                'Los Angeles','San Francisco','San Diego',
                'Sacramento','Fresno','Oakland','Long Beach',
                'Bakersfield','Modesto','Fremont'
            ],

            'Texas' => [
                'Houston','Dallas','Austin','San Antonio',
                'El Paso','Plano','Waco','Arlington',
                'Lubbock','Amarillo'
            ],

            'Florida' => [
                'Miami','Orlando','Tampa','Jacksonville',
                'Tallahassee','Naples','Gainesville',
                'Winter Haven','Lakeland','Ocala'
            ],

            'Illinois' => [
                'Chicago'
            ],

            // 🇦🇺 Australia
            'New South Wales' => [
                'Sydney','Newcastle','Wollongong'
            ],

            'Victoria' => [
                'Melbourne','Geelong','Ballarat'
            ],

            // 🇩🇿 Algeria
            'Algiers' => [
                'Bab El Oued','Hydra','El Madania'
            ],

            'Oran' => [
                'Es Sénia','Bir El Djir','Arzew'
            ],
        ];

        foreach ($citiesByState as $stateName => $cities) {

            // Récupérer l'id du state
            $state = DB::table('states')->where('name', $stateName)->first();

            if (! $state) {
                continue; // évite les erreurs
            }

            foreach ($cities as $city) {
                DB::table('cities')->insert([
                    'name'       => $city,
                    'state_id'   => $state->id,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);
            }
        }
    }
}
