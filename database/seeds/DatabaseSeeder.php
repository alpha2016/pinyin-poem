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
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(PoemTypesTableSeeder::class);
        $this->call(PoemsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
