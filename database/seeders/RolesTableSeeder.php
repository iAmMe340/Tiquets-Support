<?php
namespace Database\seeders;
use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Soporte',
            ],
            [
                'id'    => 3,
                'title' => 'Colaborador',
            ],
        ];

        Role::insert($roles);
    }
}
