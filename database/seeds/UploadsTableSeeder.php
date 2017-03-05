<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('uploads')->insert([
            'title' => 'testzwei',
            'user_id' => 2,
            'filename' => 'altklausur/2.png',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
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
