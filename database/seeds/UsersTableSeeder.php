<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Agent 1 / Biomedico',
                'email'          => 'agent1@agent1.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Agent 2 / Sistemas',
                'email'          => 'agent2@agent2.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Agent 3',
                'email'          => 'agent3@agent3.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 5,
                'name'           => 'User 1',
                'email'          => 'user1@user1.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 6,
                'name'           => 'User 2',
                'email'          => 'user2@user2.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
