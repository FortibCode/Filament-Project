<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->delete();
        $cities = array(
            array('id' => 1, 'name' => 'New York', 'state_id' => 1),
            array('id' => 2, 'name' => 'Los Angeles', 'state_id' => 5),
            array('id' => 3, 'name' => 'Chicago', 'state_id' => 13),
            array('id' => 4, 'name' => 'Houston', 'state_id' => 18),
            array('id' => 5, 'name' => 'Phoenix', 'state_id' => 3),
            array('id' => 6, 'name' => 'Philadelphia', 'state_id' => 21),
            array('id' => 7, 'name' => 'San Antonio', 'state_id' => 4),
            array('id' => 8, 'name' => 'San Diego', 'state_id' => 5),
            array('id' => 9, 'name' => 'Dallas', 'state_id' => 4),
            array('id' => 10, 'name' => 'San Jose', 'state_id' => 5),
            array('id' => 11, 'name' => 'Austin', 'state_id' => 4),
            array('id' => 12, 'name' => 'Jacksonville', 'state_id' => 9),
            array('id' => 13, 'name' => 'Fort Worth', 'state_id' => 4),
            array('id' => 14, 'name' => 'Columbus', 'state_id' => 15),
            array('id' => 15, 'name' => 'Charlotte', 'state_id' => 10),
            array('id' => 16, 'name' => 'San Francisco', 'state_id' => 5),
            array('id' => 17, 'name' => 'Indianapolis', 'state_id' => 14),
            array('id' => 18, 'name' => 'Seattle', 'state_id' => 12),
            array('id' => 19, 'name' => 'Denver', 'state_id' => 6),
            array('id' => 20, 'name' => 'Washington', 'state_id' => 22),
        );

        DB::table('cities')->insert($cities);
    }
}
