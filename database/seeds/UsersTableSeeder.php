<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'test',
        	'email' => 'test@gmail.com',
        	'password' => bcrypt('test'),
        ]);

        DB::table('users')->insert([
        	'name' => 'test2',
        	'email' => 'test2@gmail.com',
        	'password' => bcrypt('test2'),
        ]);
    }
}
