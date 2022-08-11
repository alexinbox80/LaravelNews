<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        //list all news
        $news = $this->getNews();

        //list all categories
        $categories = $this->getCategories();

        return view('news/index', [
            'newsCategories' => $categories
        ]);
    }

    public function showNews(int $id)
    {
        //return current news
        $news = $this->getNews($id);

        return view('news.showNews', [
            'id' => $id,
            'news' => $news
        ]);
    }

    public function showCategory(int $id)
    {
        //return Category by id
        $category = $this->getCategoryNews($id);

        return view('news/showCategory', [
            'id' => $id,
            'category' => $category
        ]);
    }
}
