<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        // Supprimer les anciens states
        DB::table('states')->delete();

        /**
         * States par pays
         * clé = contries.id
         */
        $statesByCountry = [

            // 🇺🇸 United States (id = 223)
            223 => [
                'Alabama','Alaska','Arizona','Arkansas','California','Colorado','Connecticut',
                'Delaware','Florida','Georgia','Hawaii','Idaho','Illinois','Indiana','Iowa',
                'Kansas','Kentucky','Louisiana','Maine','Maryland','Massachusetts','Michigan',
                'Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada',
                'New Hampshire','New Jersey','New Mexico','New York','North Carolina',
                'North Dakota','Ohio','Oklahoma','Oregon','Pennsylvania','Rhode Island',
                'South Carolina','South Dakota','Tennessee','Texas','Utah','Vermont',
                'Virginia','Washington','West Virginia','Wisconsin','Wyoming'
            ],

            // 🇦🇺 Australia (id = 9)
            9 => [
                'New South Wales','Victoria','Queensland',
                'Western Australia','South Australia',
                'Tasmania','Northern Territory',
                'Australian Capital Territory'
            ],

            // 🇦🇷 Argentina (id = 7)
            7 => [
                'Buenos Aires','Córdoba','Santa Fe','Mendoza',
                'Tucumán','Salta','Misiones','Chaco'
            ],

            // 🇦🇹 Austria (id = 10)
            10 => [
                'Vienna','Lower Austria','Upper Austria','Styria',
                'Tyrol','Salzburg','Carinthia','Vorarlberg','Burgenland'
            ],

            // 🇦🇫 Afghanistan (id = 1)
            1 => [
                'Kabul','Herat','Kandahar','Balkh',
                'Nangarhar','Badakhshan'
            ],

            // 🇩🇿 Algeria (id = 3)
            3 => [
                'Algiers','Oran','Constantine','Annaba',
                'Blida','Tizi Ouzou','Bejaia'
            ],
        ];

        foreach ($statesByCountry as $countryId => $states) {

            // Vérifier que le pays existe
            $exists = DB::table('contries')->where('id', $countryId)->exists();
            if (! $exists) {
                continue;
            }

            foreach ($states as $state) {
                DB::table('states')->insert([
                    'name'       => $state,
                    'contry_id'  => $countryId,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);
            }
        }
    }
}
