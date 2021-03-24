<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; 

class TimerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timer')->insert([
            'mobielId' => '1',
            'buzzer' => 0,
            'tijd' => '00:30',
        ]);
    }
}
