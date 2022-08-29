<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        //list all categories
        $categories = Category::query()->paginate(config('pagination.user.categories'));

        return view('news/index', [
            'newsCategories' => $categories
        ]);
    }

    public function showNews(int $id)
    {
        //return news by Id
        $news = News::query()->where('id', $id)->get();

        return view('news.showNews', [
            'id' => $id,
            'news' => $news
        ]);
    }

    public function showCategory(int $id)
    {
        $category = News::query()
            ->where('category_id', $id)
            ->paginate(config('pagination.user.news'));

        return view('news/showCategory', [
            'id' => $id,
            'category' => $category
        ]);
    }
}
