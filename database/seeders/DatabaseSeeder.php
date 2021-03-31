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
            //Alex - eerst moet humeur worden geseed vanwege het gebruik van foreign key humeur in users
<<<<<<< HEAD
                    HumeurSeeder::class,
                    UserIdSeeder::class,
                    TijdInstellingenSeeder::class,
                    MobielTableSeeder::class,
                    TimerSeeder::class,
                    AfspeellijstSeeder::class,
                    NummerSeeder::class,
                ]);
=======
            HumeurSeeder::class,
            UserIdSeeder::class,
            TijdInstellingenSeeder::class,
            MobielTableSeeder::class,
            TimerSeeder::class,
            AfspeellijstSeeder::class,
            NummerSeeder::class,
            TakenTableSeeder::class,
        ]);
>>>>>>> 49e41e4dcc9c4672238e0a7eede284352a221a30
    }
}