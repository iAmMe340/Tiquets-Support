<?php
namespace Database\Seeders;
use App\Area;

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'id'    => 1,
                'name' => 'UCI ADULTOS 6',
            ],
            [
                'id'    => 2,
                'name' => 'UCI ADULTOS 7',
            ],
            [
                'id'    => 3,
                'name' => 'UCI PEDIATRICA',
            ],
            [
                'id'    => 4,
                'name' => 'UCI NEONATAL',
            ],
            [
                'id'    => 5,
                'name' => 'UCI CORONARIA',
            ],
            [
                'id'    => 6,
                'name' => 'HOSPITALIZACION ADULTOS',
            ],
            [
                'id'    => 7,
                'name' => 'UCI COVID',
            ],
        ];

        Area::insert($areas);
    }
}
