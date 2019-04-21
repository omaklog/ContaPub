<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Benja',
            'email'=>'beno_ben@hotmail.com',
            'password'=>bcrypt("goldenboy84")
        ]);

        User::create([
            'name'=>'Carlos',
            'email'=>'Carlos@gmail.com',
            'password'=>bcrypt("goldenboy84")
        ]);

        User::create([
            'name'=>'Said',
            'email'=>'said@gmail.com',
            'password'=>bcrypt("goldenboy84")
        ]);
    }
}