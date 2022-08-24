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
        $categories = app(Category::class)->getCategories();

        return view('news/index', [
            'newsCategories' => $categories
        ]);
    }

    public function showNews(int $id)
    {
        //return news by Id
        $news = app(News::class)->getNewsById($id);

        return view('news.showNews', [
            'id' => $id,
            'news' => $news
        ]);
    }

    public function showCategory(int $id)
    {
        $category = app(News::class)->getNewsByCategoryId($id);

        return view('news/showCategory', [
            'id' => $id,
            'category' => $category
        ]);
    }
}
