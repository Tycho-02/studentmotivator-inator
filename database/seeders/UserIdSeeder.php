<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class UserIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([ 
            'userId' => '1',
            'name' => 'Alex',
            'email' => 's1118551@student.hsleiden.nl',
            'telefoonnummer' => '0640534620',
            'password' => 'lol',
            'humeur' => 'Blokken',     
            ]);
        //
    }
}
