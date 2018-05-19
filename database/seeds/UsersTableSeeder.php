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
            'name' => 'Alexis Paz',
            'email' => 'alexis@mail.com',
            'username' => 'alexis',
            'password' => bcrypt('123456'),
            'api_token' => str_random(60)
        ]);
        \App\User::create([
            'name' => 'Diana Marcela Escamilla',
            'email' => 'diana@mail.com',
            'username' => 'diana',
            'password' => bcrypt('123456'),
            'api_token' => str_random(60)
        ]);
    }
}
