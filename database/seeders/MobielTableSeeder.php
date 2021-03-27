<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use DB;
=======
use DB; 

>>>>>>> als-student-wil-ik-dat-mijn-telefoon-gelezen-word-zodat-de-timer-gaat-aftellen
class MobielTableSeeder extends Seeder
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
    }
=======
        DB::table('mobiel')->insert([
            'userId' => '1',
            'mobielId' => '1',
            'beschikbaar' => true,
            'berichtsturen' => false,
            'smiley' => false
        ]);
    }
    
>>>>>>> als-student-wil-ik-dat-mijn-telefoon-gelezen-word-zodat-de-timer-gaat-aftellen
}
