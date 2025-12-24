<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
        $states = DB::table('states')->pluck('id', 'name');

        DB::table('cities')->insert([
            ['name' => 'New York City', 'state_id' => $states['New York']],
            ['name' => 'Los Angeles',   'state_id' => $states['California']],
            ['name' => 'Houston',       'state_id' => $states['Texas']],
            ['name' => 'Miami',         'state_id' => $states['Florida']],
            ['name' => 'Chicago',       'state_id' => $states['Illinois']],
        ]);
    }

}
