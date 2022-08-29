<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::query()->paginate(config('pagination.admin.feedbacks'));

        return view('admin.feedbacks.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedbacks.edit', [
        'feedback' => $feedback
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->name = $request->input('name');
        $feedback->description = $request->input('description');

        if($feedback->save()) {
            return redirect()->route('admin.feedback.index')
                ->with('success', 'Отзыв успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить отзыв');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Feedback $feeedback
     *
     * @return RedirectResponse
     */
    public function destroy(Request $request,
                            Feedback $feedback): RedirectResponse
    {
        $feedbacks = Feedback::query()->
        where('id', $feedback->id)->
        delete();

        if ($feedbacks) {
            // пост не был удален, а был помещен в корзину
            return redirect()->route('admin.feedback.index')
                ->with('success', 'Отзыв успешно удален');
        }

        return back()->with('error', 'Не удалось удалить отзыв');
    }
}
