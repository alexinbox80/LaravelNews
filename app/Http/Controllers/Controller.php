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

    public function getCategories(int $id = null): array
    {
        $categoies = [];

        $faker = Factory::create();

        if ($id) {
            return [
                'category_id' => $id,
                'title'      => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'status'      => 'DRAFT',
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        for ($i = 1; $i < 6; $i++) {
            $categoies[$i] = [
                'id' => $i,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $categoies;
    }

    public function getCategoryNews(int $id = null): array
    {
        $news = [];

        $faker = Factory::create();

        for ($i = 1; $i <= 5; $i++) {
            $news[$i] = [
                'category_id' => $id,
                'title'       => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'status'      => 'DRAFT',
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $news;
    }

    public function getNews(int $id = null): array
    {
        $news = [];

        $faker = Factory::create();

        if ($id) {
            $news = [
                'category_id' => $id,
                'title'      => $faker->jobTitle(),
                'author'      => $faker->userName(),
                'status'      => 'DRAFT',
                'description' => $faker->text(100),
                'created_at'  => now('Europe/Moscow')
            ];
        }

        return $news;
    }
}
