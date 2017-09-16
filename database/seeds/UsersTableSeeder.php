<?php

use Illuminate\Database\Seeder;

use App\Models\User;

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