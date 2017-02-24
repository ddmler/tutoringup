<?php

use Illuminate\Database\Seeder;

class StudiengangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studiengaenge')->insert(['name' => 'Informatik']);
        DB::table('studiengaenge')->insert(['name' => 'Mathematik']);
        DB::table('studiengaenge')->insert(['name' => 'BWL']);
    }
}
