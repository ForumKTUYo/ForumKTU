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
        User::insert([
            'nickname' => 'user',
            'name' => 'user',
            'surname' => 'user',
            'birthday' => '2020-01-01',
            'email' => 'user@user',
            'password' => Hash::make('password'),
            'post_count' => 0,
            'role' => 'admin'
        ]);
    }
}
