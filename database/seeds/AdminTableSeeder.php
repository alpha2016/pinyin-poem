<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->insert(array(
            [
                'realname'   => 'admin',
                'email'      => 'admin@pwrd.com',
                'password'   => bcrypt('password'),
                'status'     => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'realname'   => '哈哈',
                'email'      => 'pixseed@pwrd.com',
                'password'   => bcrypt('password'),
                'status'     => 0,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ));
    }
}
