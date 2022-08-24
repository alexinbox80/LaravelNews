<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $news = [];

        $faker = Factory::create('ru_RU');

        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 1; $i <= 100; $i++) {
            $news[$i] = [
                'category_id' => rand(1, 10),
                'title'       => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'status'      => News::DRAFT,
                'is_private'  => false,
                'image'       => $faker->imageUrl(),
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $news;
    }
}
