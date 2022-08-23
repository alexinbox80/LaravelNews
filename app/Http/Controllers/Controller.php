<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategories(int $id = null): array
    {
        if ($id) {
            return DB::table('categories')
                ->where('id', '=', $id)
                ->get()->toArray();
        }

        return DB::table('categories')->get()->toArray();
    }

    public function getCategoryNews(int $id = null): array
    {
        if ($id) {
            return DB::table('news')
                ->where('category_id', '=', $id)
                ->get()->toArray();
        }

        return DB::table('news')
            ->get()->toArray();
    }

    public function getNews(int $id = null): array
    {
        if ($id) {
            return DB::table('news')
                ->where('id', '=', $id)
                ->get()->toArray();
        }

        return DB::table('news')
            ->get()->toArray();
    }
}
