<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StudiengangTableSeeder::class);
        $this->call(SchulfachTableSeeder::class);
        $this->call(InserateTableSeeder::class);
        $this->call(UploadsTableSeeder::class);
    }
}
