<?php
namespace Database\Seeders;
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
                'password'       => '123456789',
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
                'name'           => 'Agent 3 / Infraestructura',
                'email'          => 'agent3@agent3.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 5,
                'name'           => 'User 1 / UCI 7 ADULTOS LADO A ',
                'email'          => 'user1@user1.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 6,
                'name'           => 'User 2 / UCI 7 ADULTOS LADO B',
                'email'          => 'user2@user2.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 7,
                'name'           => 'User 3 / UCI 7 ADULTOS LADO C',
                'email'          => 'user3@user3.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 8,
                'name'           => 'User 4 / UCI 7 ADULTOS LADO D',
                'email'          => 'user4@user4.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
            [
                'id'             => 9,
                'name'           => 'User 5 / UCI Pediatrica',
                'email'          => 'user5@user5.com',
                'password'       => '$2y$12$m4dpS7iTleQqUanHPZs0eORQKVAY4GYM.wxwTJkIecihhxQTTDb0i',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
