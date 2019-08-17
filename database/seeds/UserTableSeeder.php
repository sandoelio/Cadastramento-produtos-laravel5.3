<?php

use Illuminate\Database\Seeder;
Use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Camuel',
        	'email'=> 'camuel@hotmail.com',
        	'password'=>bcrypt('123456')
        ]);
    }
}
