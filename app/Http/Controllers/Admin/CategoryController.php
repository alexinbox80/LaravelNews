<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->paginate(config('pagination.admin.news'));

        return view('admin.categories.index', [
            'newsCategory' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255']
        ]);

        $category = new Category(
            $request->only(['title', 'author', 'image', 'description'])
        );

        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->input('title');
        $category->author = $request->input('author');
        $category->image = $request->input('image');
        $category->description = $request->input('description');

        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить запись');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Category $category
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request,
                            Category $category): RedirectResponse
    {
        $categories = Category::query()->
        where('id', $category->id)->
        delete();

        $news = News::query()->
        where('category_id', $category->id)->
        delete();

        if ($categories && $news) {
            // пост не был удален, а был помещен в корзину
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успешно удалена');
        }

        return back()->with('error', 'Не удалось удалить категорию');
    }
}
