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
                'name' => 'QUIROFANO',
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
            [
                'id'    => 8,
                'name' => 'UCI 7 ADULTOS LADO A',
            ],
            [
                'id'    => 9,
                'name' => 'UCI 7 ADULTOS LADO B',
            ],
            [
                'id'    => 10,
                'name' => 'UCI 7 ADULTOS LADO C',
            ],
            [
                'id'    => 11,
                'name' => 'UCI 7 ADULTOS LADO D',
            ],
            [
                'id'    => 12,
                'name' => 'Call Center',
            ],
            [
                'id'    => 13,
                'name' => 'Talento Humano',
            ],
        ];

        Area::insert($areas);
    }
}
