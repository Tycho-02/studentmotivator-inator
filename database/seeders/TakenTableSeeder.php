<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TakenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $date = new DateTime('2021-3-25');
        DB::table('taken')->insert([
            'title' => "test1",
            'omschrijving' => "Dit is test 1",
            'vak' => "IPMEDT5",
            'deadline' => '2021-04-25',
            'uitvoerdatum' => '2021-03-24',
        ]);
        DB::table('taken')->insert([
            'title' => "test2",
            'omschrijving' => "Dit is test 2",
            'vak' => "IML",
            'deadline' => '2021-04-26',
            'uitvoerdatum' => '2021-03-25',
        ]);
        DB::table('taken')->insert([
            'title' => "test3",
            'omschrijving' => "Dit is test 3",
            'vak' => "IKFRAM",
            'deadline' => '2021-04-29',
            'uitvoerdatum' => '2021-03-27',
        ]);
        DB::table('taken')->insert([
            'title' => "test4",
            'omschrijving' => "Dit is test 4",
            'vak' => "IATBD",
            'deadline' => '2021-04-12',
            'uitvoerdatum' => '2021-03-21',
        ]);
    }
}
