<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TijdSlapenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tijdslapen')->insert([ 
            'userId' => '1',
            'tijdInBedGegaan' => '2021-04-01 22:30:00',
            'tijdUitBedGegaan' => '2021-04-02 05:30:00',
            ]);

            DB::table('tijdslapen')->insert([ 
                'userId' => '1',
                'tijdInBedGegaan' => '2021-04-02 21:30:00',
                'tijdUitBedGegaan' => '2021-04-03 06:30:00',
                ]);
                DB::table('tijdslapen')->insert([ 
                    'userId' => '1',
                    'tijdInBedGegaan' => '2021-04-03 22:30:00',
                    'tijdUitBedGegaan' => '2021-04-04 07:30:00',
                    ]);
            
                    DB::table('tijdslapen')->insert([ 
                        'userId' => '1',
                        'tijdInBedGegaan' => '2021-04-04 23:30:00',
                        'tijdUitBedGegaan' => '2021-04-05 06:30:00',
                        ]);
            
                        DB::table('tijdslapen')->insert([ 
                            'userId' => '1',
                            'tijdInBedGegaan' => '2021-04-05 20:00:00',
                            'tijdUitBedGegaan' => '2021-04-06 07:00:00',
                            ]);
                            DB::table('tijdslapen')->insert([ 
                                'userId' => '1',
                                'tijdInBedGegaan' => '2021-04-06 23:59:00',
                                'tijdUitBedGegaan' => '2021-04-07 10:00:00',
                                ]);
            
        //
    }
}