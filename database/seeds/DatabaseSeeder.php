<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('admins')->insert([
            'name' => 'win',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
