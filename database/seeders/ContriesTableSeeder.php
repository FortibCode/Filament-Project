<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contries')->delete();
        $contries = array(
            array('id' => 1,'code' => 'AF','name' => 'Afghanistan', 'phonecode' => 93),
            array('id' => 2,'code' => 'AL','name' => 'Albania', 'phonecode' => 355),
            array('id' => 3,'code' => 'DZ','name' => 'Algeria', 'phonecode' => 213),
            array('id' => 4,'code' => 'AD','name' => 'Andorra', 'phonecode' => 376),
            array('id' => 5,'code' => 'AO','name' => 'Angola', 'phonecode' => 244),
            array('id' => 6,'code' => 'AG','name' => 'Antigua and Barbuda', 'phonecode' => 1),
            array('id' => 7,'code' => 'AR','name' => 'Argentina', 'phonecode' => 54),
            array('id' => 8, 'code' => 'AM','name' => 'Armenia', 'phonecode' => 374),
            array('id' => 9,'code' => 'AU','name' => 'Australia', 'phonecode' => 61),
            array('id' => 10,'code' => 'AT','name' => 'Austria', 'phonecode' => 43),
            array('id' => 11,'code' => 'AZ','name' => 'Azerbaijan', 'phonecode' => 994),
            array('id' => 12,'code' => 'BS','name' => 'Bahamas', 'phonecode' => 1),
            array('id' => 13,'code' => 'BH','name' => 'Bahrain', 'phonecode' => 973),
        );
        DB::table('contries')->insert($contries);
        

    }
}
