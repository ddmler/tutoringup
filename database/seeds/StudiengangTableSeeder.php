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
        DB::table('studiengaenge')->insert(['name' => 'Physik']);
        DB::table('studiengaenge')->insert(['name' => 'Wirtschaftswissenschaften']);
        DB::table('studiengaenge')->insert(['name' => 'Chemie']);
        DB::table('studiengaenge')->insert(['name' => 'Biologie']);
        DB::table('studiengaenge')->insert(['name' => 'Psychologie']);
        DB::table('studiengaenge')->insert(['name' => 'Linguistik']);
        DB::table('studiengaenge')->insert(['name' => 'Ernährungswissenschaft']);
        DB::table('studiengaenge')->insert(['name' => 'Europäische Medienwissenschaft']);
        DB::table('studiengaenge')->insert(['name' => 'Geowissenschaften']);
        DB::table('studiengaenge')->insert(['name' => 'Geschichte']);
        DB::table('studiengaenge')->insert(['name' => 'Pädagogik']);
        DB::table('studiengaenge')->insert(['name' => 'Sportwissenschaften']);
        DB::table('studiengaenge')->insert(['name' => 'Religionswissenschaften']);
        DB::table('studiengaenge')->insert(['name' => 'Rechtswissenschaften']);
        DB::table('studiengaenge')->insert(['name' => 'Philosophie']);
        DB::table('studiengaenge')->insert(['name' => 'Politikwissenschaften']);
        DB::table('studiengaenge')->insert(['name' => 'Kulturwissenschaften']);
        DB::table('studiengaenge')->insert(['name' => 'Sprachwissenschaften']);
        DB::table('studiengaenge')->insert(['name' => 'Lehramt']);
        DB::table('studiengaenge')->insert(['name' => 'Sonstiges']);

    }
}
