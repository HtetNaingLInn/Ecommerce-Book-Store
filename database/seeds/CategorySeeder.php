<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $names = [
            ['name' => 'Recommend'],
            ['name' => 'Education'],
            ['name' => 'History'],
            ['name' => 'Love'],
            ['name' => 'Health'],

        ];

        foreach ($names as $name) {
            Category::create([
                'name' => $name['name'],

            ]);
        }

    }
}
