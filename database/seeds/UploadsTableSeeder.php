<?php

use Illuminate\Database\Seeder;

class UploadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uploads')->insert([
        	'title' => 'Testimage',
        	'user_id' => 1,
        	'filename' => 'altklausur/1.jpg',
        ]);
        DB::table('uploads')->insert([
            'title' => 'testzwei',
            'user_id' => 2,
            'filename' => 'altklausur/2.png',
        ]);

        DB::table('studiengang_upload')->insert([
            'upload_id' => 1,
            'studiengang_id' => 1,
        ]);

        DB::table('studiengang_upload')->insert([
            'upload_id' => 2,
            'studiengang_id' => 2,
        ]);  
    }
}
