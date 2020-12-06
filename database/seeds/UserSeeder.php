<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nickname' => 'user',
            'name' => 'vardenis',
            'surname' => 'pavardenis',
            'birthday' => '2020-9-11',
            'email' => 'user@user',
            'password' => Hash::make('password'),
            'post_count' => 0,
            'role' => 'admin'
        ]);
    }
}
