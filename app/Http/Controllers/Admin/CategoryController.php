<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
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
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $category = new Category(
            $request->validated()
        );

        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.create.success'));
        }

        return back()->with('error', __('messages.admin.categories.create.fail'));
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
     * @param EditRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->validated());

        if($category->save()) {
            return redirect()->route('admin.categories.index')
                ->with('success',  __('messages.admin.categories.update.success'));
        }

        return back()->with('error', __('messages.admin.categories.update.fail'));

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
        $categories = Category::destroy($category->id);

        $news = News::query()->
        where('category_id', $category->id)->
        delete();

        if ( $categories && $news ) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.destroy.success'));
        }

        return back()->with('error', __('messages.admin.categories.destroy.fail'));
    }
}
