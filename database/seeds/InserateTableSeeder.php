<?php

use Illuminate\Database\Seeder;

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
        ]);
        DB::table('inserate')->insert([
            'title' => 'testzwei',
            'user_id' => 2,
            'body' => 'this is just another test.',
        ]);
    }
}
