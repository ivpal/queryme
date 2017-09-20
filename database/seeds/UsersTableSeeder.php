<?php

use Illuminate\Database\Seeder;

use ApiV1\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'webapp',
            'nickname' => 'webapp',
        ]);
    }
}