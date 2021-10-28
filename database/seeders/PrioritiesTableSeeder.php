<?php
namespace Database\Seeders;
use App\Priority;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $priorities = [
            'Baja', 'Media', 'Alta', 'Critica'
        ];

        foreach($priorities as $priority)
        {
            Priority::create([
                'name'  => $priority,
                'color' => $faker->hexcolor
            ]);
        }
    }
}
