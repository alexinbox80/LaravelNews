<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert($this->getData());
    }

    private function getData()
    {
        $categories = [];

        $faker = Factory::create('ru_RU');

        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 1; $i <= 20; $i++) {
            $categories[$i] = [
                'title'       => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'image'       => $faker->imageUrl(),
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $categories;
    }
}
