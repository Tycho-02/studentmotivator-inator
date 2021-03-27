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
                    HumeurSeeder::class,
                    UserIdSeeder::class,
                    TijdInstellingenSeeder::class,
                    MobielTableSeeder::class,
                    TimerSeeder::class,
                    AfspeellijstSeeder::class,
                    NummerSeeder::class,
                ]);
=======
    //Alex - eerst moet humeur worden geseed vanwege het gebruik van foreign key humeur in users
            HumeurSeeder::class,
            UserIdSeeder::class,
            TijdInstellingenSeeder::class,
            MobielTableSeeder::class,
            TimerSeeder::class,
        ]);
>>>>>>> als-student-wil-ik-dat-mijn-telefoon-gelezen-word-zodat-de-timer-gaat-aftellen
    }
}
