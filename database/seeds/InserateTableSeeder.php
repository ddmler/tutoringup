<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InserateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inserate')->insert([
        	'title' => 'test',
        	'user_id' => 1,
        	'body' => 'this is just a test.',
            'art' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('inserate')->insert([
            'title' => 'testzwei',
            'user_id' => 2,
            'body' => 'this is just another test.',
            'art' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('inserat_studiengang')->insert([
            'inserat_id' => 1,
            'studiengang_id' => 1,
        ]);

        DB::table('inserat_schulfach')->insert([
            'inserat_id' => 2,
            'schulfach_id' => 2,
        ]);        
    }
}
