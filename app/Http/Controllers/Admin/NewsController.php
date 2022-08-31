<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\Models\Category;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(NewsQueryBuilder $builder)
    {
        return view('admin.news.index', [
            'newsList' => $builder->getNews()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function store(
        CreateRequest $request,
        NewsQueryBuilder $builder
    ): RedirectResponse {

        $news = $builder->create(
            $request->validated()
        );

        if($news) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }

        return back()->with('error', __('messages.admin.news.create.fail'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Some text";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param News $news
     * @param NewsQueryBuilder $builder
     * @return RedirectResponse
     */
    public function update(
        EditRequest $request,
        News $news,
        NewsQueryBuilder $builder
    ): RedirectResponse {
        if($builder->update($news, $request->validated())) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));

        }

        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     *
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
//        $news = News::destroy($news->id);
//
//        if ($news) {
//            // пост не был удален, а был помещен в корзину
//            return redirect()->route('admin.news.index')
//                ->with('success', 'Новость успешно удалена');
//        }
//
//        return back()->with('error', 'Не удалось удалить новость');

        try {
            $deleted = $news->delete();
            if ( $deleted === false) {
                return \response()->json(['status' => 'error'], 400);
            } else {
                return \response()->json(['status' => 'ok']);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage().' '.$e->getCode());
            return \response()->json(['status' => 'error'], 400);
        }
    }
}
