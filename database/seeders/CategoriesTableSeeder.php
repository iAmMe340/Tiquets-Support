<?php
namespace Database\Seeders;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $categories = [
            "GSI/Soporte", "GT/Soporte Biomedico", "GT/Soporte Sistemas", "GAF/Infraestructura"
        ];

        foreach($categories as $category)
        {
            Category::create([
                'name'  => $category,
                'color' => $faker->hexcolor
            ]);
        }
    }
}
