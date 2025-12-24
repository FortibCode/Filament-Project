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
            // Ajout du pays United States pour les états
            ['id' => 223, 'code' => 'US', 'name' => 'United States', 'phonecode' => 1],
        ];

        DB::table('contries')->insert($countries);
    }
}
