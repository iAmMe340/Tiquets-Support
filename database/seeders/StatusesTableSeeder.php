<?php
namespace Database\Seeders;
use App\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $statuses = [
            'Abierto', 'Cerrado', 'Suspendido'
        ];

        foreach($statuses as $status)
        {
            Status::create([
                'name'  => $status,
                'color' => $faker->hexcolor
            ]);
        }
    }
}
