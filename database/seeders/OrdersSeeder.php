<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('orders')->insert($this->getData());
    }

    private function getData()
    {
        $orders = [];

        $faker = Factory::create('ru_RU');

        $faker->addProvider(new \Faker\Provider\ru_RU\Person($faker));

        for ($i = 1; $i <= 100; $i++) {
            $orders[$i] = [
                'name'       => $faker->userName(),
                'phone'      => $faker->numerify('##########'),
                'email'      => $faker->email(),
                'url'      => $faker->url(),
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow'),
                'updated_at'  => now('Europe/Moscow')
            ];
        }

        return $orders;
    }
}
