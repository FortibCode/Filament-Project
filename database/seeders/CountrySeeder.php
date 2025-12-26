<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supprime les anciens pays
        DB::table('contries')->delete();

        $countries = [
            ['id' => 1,  'code' => 'AF', 'name' => 'Afghanistan', 'phonecode' => 93],
            ['id' => 2,  'code' => 'AL', 'name' => 'Albania', 'phonecode' => 355],
            ['id' => 3,  'code' => 'DZ', 'name' => 'Algeria', 'phonecode' => 213],
            ['id' => 4,  'code' => 'AD', 'name' => 'Andorra', 'phonecode' => 376],
            ['id' => 5,  'code' => 'AO', 'name' => 'Angola', 'phonecode' => 244],
            ['id' => 6,  'code' => 'AG', 'name' => 'Antigua and Barbuda', 'phonecode' => 1],
            ['id' => 7,  'code' => 'AR', 'name' => 'Argentina', 'phonecode' => 54],
            ['id' => 8,  'code' => 'AM', 'name' => 'Armenia', 'phonecode' => 374],
            ['id' => 9,  'code' => 'AU', 'name' => 'Australia', 'phonecode' => 61],
            ['id' => 10, 'code' => 'AT', 'name' => 'Austria', 'phonecode' => 43],
            ['id' => 11, 'code' => 'AZ', 'name' => 'Azerbaijan', 'phonecode' => 994],
            ['id' => 12, 'code' => 'BS', 'name' => 'Bahamas', 'phonecode' => 1],
            ['id' => 13, 'code' => 'BH', 'name' => 'Bahrain', 'phonecode' => 973],
            ['id' => 223, 'code' => 'US', 'name' => 'United States', 'phonecode' => 1],
            ['id' => 224, 'code' => 'UY', 'name' => 'Uruguay', 'phonecode' => 598],
            ['id' => 225, 'code' => 'UZ', 'name' => 'Uzbekistan', 'phonecode' => 998],
            ['id' => 226, 'code' => 'VU', 'name' => 'Vanuatu', 'phonecode' => 678],
            ['id' => 227, 'code' => 'VA', 'name' => 'Vatican City', 'phonecode' => 39],
            ['id' => 228, 'code' => 'VE', 'name' => 'Venezuela', 'phonecode' => 58],
            ['id' => 229, 'code' => 'VN', 'name' => 'Vietnam', 'phonecode' => 84],
            ['id' => 230, 'code' => 'YE', 'name' => 'Yemen', 'phonecode' => 967],
            ['id' => 231, 'code' => 'ZM', 'name' => 'Zambia', 'phonecode' => 260],
            ['id' => 232, 'code' => 'ZW', 'name' => 'Zimbabwe', 'phonecode' => 263],
            ['id' => 233, 'code' => 'XK', 'name' => 'Kosovo', 'phonecode' => 383],
            ['id' => 234, 'code' => 'SS', 'name' => 'South Sudan', 'phonecode' => 211],
            ['id' => 235, 'code' => 'CW', 'name' => 'Curaçao', 'phonecode' => 599],
            ['id' => 236, 'code' => 'BQ', 'name' => 'Bonaire, Sint Eustatius and Saba', 'phonecode' => 599],
            ['id' => 237, 'code' => 'MF', 'name' => 'Saint Martin (French part)', 'phonecode' => 590],
            ['id' => 238, 'code' => 'SX', 'name' => 'Sint Maarten (Dutch part)', 'phonecode' => 1],
            ['id' => 239, 'code' => 'SS', 'name' => 'South Sudan', 'phonecode' => 211],
            ['id' => 240, 'code' => 'TL', 'name' => 'Timor-Leste', 'phonecode' => 670],
            ['id' => 241, 'code' => 'BQ', 'name' => 'Bonaire, Sint Eustatius and Saba', 'phonecode' => 599],
            ['id' => 242, 'code' => 'EH', 'name' => 'Western Sahara', 'phonecode' => 212],
            ['id' => 243, 'code' => 'SS', 'name' => 'South Sudan', 'phonecode' => 211],
            ['id' => 244, 'code' => 'XK', 'name' => 'Kosovo', 'phonecode' => 383],
            ['id' => 245, 'code' => 'CW', 'name' => 'Curaçao', 'phonecode' => 599],
            ['id' => 246, 'code' => 'MF', 'name' => 'Saint Martin (French part)', 'phonecode' => 590],
            ['id' => 247, 'code' => 'SX', 'name' => 'Sint Maarten (Dutch part)', 'phonecode' => 1],
            ['id' => 248, 'code' => 'TL', 'name' => 'Timor-Leste', 'phonecode' => 670],
            ['id' => 249, 'code' => 'EH', 'name' => 'Western Sahara', 'phonecode' => 212],
            ['id' => 250, 'code' => 'BQ', 'name' => 'Bonaire, Sint Eustatius and Saba', 'phonecode' => 599],
            ['id' => 251, 'code' => 'SS', 'name' => 'South Sudan', 'phonecode' => 211],
            ['id' => 252, 'code' => 'XK', 'name' => 'Kosovo', 'phonecode' => 383],
            ['id' => 253, 'code' => 'CW', 'name' => 'Curaçao', 'phonecode' => 599],
            ['id' => 254, 'code' => 'MF', 'name' => 'Saint Martin (French part)', 'phonecode' => 590],
            ['id' => 255, 'code' => 'SX', 'name' => 'Sint Maarten (Dutch part)', 'phonecode' => 1],
            ['id' => 256, 'code' => 'TL', 'name' => 'Timor-Leste', 'phonecode' => 670],
            ['id' => 257, 'code' => 'EH', 'name' => 'Western Sahara', 'phonecode' => 212],
            ['id' => 258, 'code' => 'BQ', 'name' => 'Bonaire, Sint Eustatius and Saba', 'phonecode' => 599],
            ['id' => 259, 'code' => 'SS', 'name' => 'South Sudan', 'phonecode' => 211],
            ['id' => 260, 'code' => 'XK', 'name' => 'Kosovo', 'phonecode' => 383],
            ['id' => 261, 'code' => 'CW', 'name' => 'Curaçao', 'phonecode' => 599],
            ['id' => 262, 'code' => 'MF', 'name' => 'Saint Martin (French part)', 'phonecode' => 590],
            ['id' => 263, 'code' => 'SX', 'name' => 'Sint Maarten (Dutch part)', 'phonecode' => 1],
            ['id' => 264, 'code' => 'TL', 'name' => 'Timor-Leste', 'phonecode' => 670],
            ['id' => 265, 'code' => 'EH', 'name' => 'Western Sahara', 'phonecode' => 212],
            
        ];

        DB::table('contries')->insert($countries);
    }
}
