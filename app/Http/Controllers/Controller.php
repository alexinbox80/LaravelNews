<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews(int $id = null): array
    {
        $news = [];
        $faker = Factory::create();

        if ($id) {
            return [
                'category_id' => rand(1, 5),
                'title'      => $faker->jobTitle,
                'author'      => $faker->userName,
                'status'      => 'DRAFT',
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        for ($i = 1; $i <= 10; $i++) {
            $news[$i] = [
                'category_id' => rand(1, 5),
                'title'      => $faker->jobTitle,
                'author'      => $faker->userName,
                'status'      => 'DRAFT',
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $news;
    }
}
