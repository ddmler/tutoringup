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
        DB::table('schulfaecher')->insert(['name' => 'Biologie']);
        DB::table('schulfaecher')->insert(['name' => 'Geografie']);
        DB::table('schulfaecher')->insert(['name' => 'Geschichte']);
        DB::table('schulfaecher')->insert(['name' => 'Kunst']);
        DB::table('schulfaecher')->insert(['name' => 'LER']);
        DB::table('schulfaecher')->insert(['name' => 'Musik']);
        DB::table('schulfaecher')->insert(['name' => 'Physik']);
        DB::table('schulfaecher')->insert(['name' => 'Politische Bildung']);
        DB::table('schulfaecher')->insert(['name' => 'Sport']);
        DB::table('schulfaecher')->insert(['name' => 'WAT']);#
        DB::table('schulfaecher')->insert(['name' => 'Latein']);
        DB::table('schulfaecher')->insert(['name' => 'Sonstiges']);
        DB::table('schulfaecher')->insert(['name' => 'Chemie']);
        DB::table('schulfaecher')->insert(['name' => 'Informatik']);
    }
}
