<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('states')->delete();

        $states = [
            ['id' => 1,  'name' => 'Alabama',     'contry_id' => 223],
            ['id' => 2,  'name' => 'Alaska',      'contry_id' => 223],
            ['id' => 3,  'name' => 'Arizona',     'contry_id' => 223],
            ['id' => 4,  'name' => 'Arkansas',    'contry_id' => 223],
            ['id' => 5,  'name' => 'California',  'contry_id' => 223],
            ['id' => 6,  'name' => 'Colorado',    'contry_id' => 223],
            ['id' => 7,  'name' => 'Connecticut', 'contry_id' => 223],
            ['id' => 8,  'name' => 'Delaware',    'contry_id' => 223],
            ['id' => 9,  'name' => 'Florida',     'contry_id' => 223],
            ['id' => 10, 'name' => 'Georgia',     'contry_id' => 223],
            ['id' => 11, 'name' => 'Hawaii',      'contry_id' => 223],
            ['id' => 12, 'name' => 'Idaho',       'contry_id' => 223],
            ['id' => 13, 'name' => 'Illinois',    'contry_id' => 223],
            ['id' => 14, 'name' => 'Indiana',     'contry_id' => 223],
            ['id' => 15, 'name' => 'Iowa',        'contry_id' => 223],
            ['id' => 16, 'name' => 'Kansas',      'contry_id' => 223],
            ['id' => 17, 'name' => 'Kentucky',    'contry_id' => 223],
            ['id' => 18, 'name' => 'Louisiana',   'contry_id' => 223],
            ['id' => 19, 'name' => 'Maine',       'contry_id' => 223],
            ['id' => 20, 'name' => 'Maryland',    'contry_id' => 223],
        ];

        DB::table('states')->insert($states);


            
    }
}
