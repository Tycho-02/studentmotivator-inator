<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use DB;
=======
use DB; 

>>>>>>> als-student-wil-ik-dat-mijn-telefoon-gelezen-word-zodat-de-timer-gaat-aftellen
class TimerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //
=======
        DB::table('timer')->insert([
            'mobielId' => '1',
            'buzzer' => 0,
            'tijd' => '00:30',
        ]);
>>>>>>> als-student-wil-ik-dat-mijn-telefoon-gelezen-word-zodat-de-timer-gaat-aftellen
    }
}
