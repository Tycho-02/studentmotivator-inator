<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon as Carbon;
class NummerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '1',
            'naam' => 'Klassieke muziek voor tijdens het studeren',
            'artiest' => '',
            'genre' => 'Klassiek',
            'bestandLocatie' => 'Klassieke muziek voor tijdens het studeren.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '1',
            'naam' => 'White Oak',
            'artiest' => 'dryhope',
            'genre' => 'jazz',
            'bestandLocatie' => 'White Oak.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '1',
            'naam' => 'Careless',
            'artiest' => 'No Spirit',
            'genre' => 'jazz',
            'bestandLocatie' => 'No Spirit  Careless.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '1',
            'naam' => 'Effervescent',
            'artiest' => 'Toonorth',
            'genre' => 'jazz',
            'bestandLocatie' => 'Effervescent.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);



        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Weightless',
            'artiest' => 'Marconi Union',
            'genre' => 'Dance/Electronic',
            'bestandLocatie' => 'Marconi Union - Weightless.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Airstream',
            'artiest' => 'Airstream',
            'genre' => 'Dance/Electronic',
            'bestandLocatie' => 'Airstream - Electra.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Mellomaniac',
            'artiest' => 'Dj Shah',
            'genre' => 'Dance/Electronic',
            'bestandLocatie' => 'DJ Shah - Mellomaniac (Chillout MIx).mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Watermark',
            'artiest' => 'Enya',
            'genre' => 'Ambient',
            'bestandLocatie' => 'Enya Watermark.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Strawberry Swing',
            'artiest' => 'Coldplay',
            'genre' => 'Rock',
            'bestandLocatie' => 'Coldplay - Strawberry Swing.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Please Don’t Go',
            'artiest' => 'Barcelona',
            'genre' => 'Rock',
            'bestandLocatie' => 'Barcelona – Please Don’t Go.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Pure Shores',
            'artiest' => 'All Saints',
            'genre' => 'Dance/Electronic',
            'bestandLocatie' => 'All Saints - Pure Shores.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Someone Like You',
            'artiest' => 'Adele',
            'genre' => 'Pop',
            'bestandLocatie' => 'Adele - Someone Like You.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'Canzonetta Sull’Aria',
            'artiest' => 'Mozart ',
            'genre' => 'klassiek',
            'bestandLocatie' => 'Renata Scotto & Mirella Freni Canzonetta sull aria.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
            'afspeellijstId' => '2',
            'naam' => 'We Can Fly',
            'artiest' => 'Cafe Del Mar',
            'genre' => 'relax',
            'bestandLocatie' => 'Wonderful Café Del Mar Music - We Can Fly.mp3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('nummer')->insert([ 
                'afspeellijstId' => '3',
                'naam' => 'Happy',
                'artiest' => 'Pharrel Williams',
                'genre' => 'pop',
                'bestandLocatie' => 'Pharrell-Williams-Happy.mp3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
