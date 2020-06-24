<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE users');
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@larvel.test',
            'email_verified_at' => now(),
            'password' => bcrypt(1234),
            'remember_token' => Str::random(10),
            'first_name' =>'Vugar',
            'last_name' =>'Baxisov',
            'api_token' => Str::random(60)
        ]);


    }

}
