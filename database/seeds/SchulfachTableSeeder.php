<?php

use Illuminate\Database\Seeder;

class SchulfachTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schulfaecher')->insert(['name' => 'Mathematik']);
        DB::table('schulfaecher')->insert(['name' => 'Deutsch']);
        DB::table('schulfaecher')->insert(['name' => 'Englisch']);
    }
}
