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
        	[
        		'first_name' => 'Michael Adam',
        		'last_name' => 'Trinidad',
        		'email' => 'adam@adam.com',
        		'role_id' => 2, // Administrator
        		'password' => bcrypt('password')
        	],
        	[
        		'first_name' => 'Adam',
        		'last_name' => 'Trinidad',
        		'email' => 'm.trinidad@bfcgroup.org',
        		'role_id' => 3, // Manager
        		'password' => bcrypt('password')
        	],
        	[
        		'first_name' => 'John',
        		'last_name' => 'Doe',
        		'email' => 'john@doe.com',
        		'role_id' => 4, // Employee
        		'password' => bcrypt('password')
        	]
        ]);
    }
}
