<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('resources')->insert($this->getData());
    }

    private function getData()
    {

        $urls = [
            'https://news.rambler.ru/rss/tech',
            'https://news.rambler.ru/rss/moscow_city',
            'https://news.rambler.ru/rss/holiday',
            'https://news.rambler.ru/rss/technology',
            'https://news.rambler.ru/rss/gifts',
            'https://news.rambler.ru/rss/world',
        ];

        $resources = [];

        $faker = Factory::create('ru_RU');

        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 1; $i <= count($urls); $i++) {
            $resources[$i] = [
                'url'      => $urls[$i - 1],
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $resources;
    }
}
