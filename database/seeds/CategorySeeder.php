<?php

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            'uncategorized', 'cucina', 'politica', 'sport', 'cronaca', 'animali', 'viaggi',
        ];

        foreach($categories as $category){
            Category::create([
                'slug'          => Category::getSlug($category),
                'name'          => $category,
                'description'   => $faker->paragraphs(rand(2,10), true),
            ]);
        }
    }
}
