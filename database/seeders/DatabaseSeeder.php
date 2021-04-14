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
            HumeurSeeder::class,
            UserIdSeeder::class,
            TijdInstellingenSeeder::class,
            TijdSlapenSeeder::class,
            MobielTableSeeder::class,
            TimerSeeder::class,
            AfspeellijstSeeder::class,
            NummerSeeder::class,
            TakenTableSeeder::class,
            PuntentellingSeeder::class,
            StudiebuddySeeder::class,
            GekochteUiterlijkjesSeeder::class
        ]);
    }
}
