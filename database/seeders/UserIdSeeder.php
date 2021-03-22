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
            'name' => 'Peter',
            'email' => 's1105390@student.hsleiden.nl',
            'telefoonnummer' => '0617416016',
            'password' => 'hoi',
            'humeur' => 'blij'        
        ]);
    }
}
