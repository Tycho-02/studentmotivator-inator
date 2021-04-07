<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
<<<<<<< HEAD
        //Alex - eerst moet humeur worden geseed vanwege het gebruik van foreign key humeur in users
=======
            //Alex - eerst moet humeur worden geseed vanwege het gebruik van foreign key humeur in users
>>>>>>> 4565b5cf15e6096150312ebaf0c775226ec2faa3
            HumeurSeeder::class,
            UserIdSeeder::class,
            TijdInstellingenSeeder::class,
            MobielTableSeeder::class,
            TimerSeeder::class,
            AfspeellijstSeeder::class,
            NummerSeeder::class,
<<<<<<< HEAD
=======
            TakenTableSeeder::class,
>>>>>>> 4565b5cf15e6096150312ebaf0c775226ec2faa3
        ]);
    }
}
