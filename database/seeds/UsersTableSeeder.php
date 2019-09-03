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
        \App\User::create([
            'name' => "Aleksandar Rusev",
            'email' => "arusev@hotmail.com",
            'password' => bcrypt("password"),
            'is_admin' => 1
        ]);

        \App\User::create([
            'name' => "John Smith",
            'email' => "johnsmith@mail.com",
            'password' => bcrypt("password"),
        ]);
        \App\User::create([
            'name' => "Georgi Petrov",
            'email' => "georgipetrov@asldfmsalkdfm.com",
            'password' => bcrypt("password"),
        ]);
        \App\User::create([
            'name' => "Ivan Dimitrov",
            'email' => "ivandimitrov@asldfmsalkdfm.com",
            'password' => bcrypt("password"),
        ]);
    }
}
