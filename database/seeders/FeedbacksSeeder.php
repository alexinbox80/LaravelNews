<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->insert($this->getData());
    }

    private function getData()
    {
        $feedbacks = [];

        $faker = Factory::create('ru_RU');

        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 1; $i <= 100; $i++) {
            $feedbacks[$i] = [
                'name'       => $faker->userName(),
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow'),
            ];
        }

        return $feedbacks;
    }
}
