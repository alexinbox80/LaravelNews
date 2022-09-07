<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedbacks\EditRequest;
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
     * @param EditRequest $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Feedback $feedback)
    {
        $feedback = $feedback->fill($request->validated());

        if($feedback->save()) {
            return redirect()->route('admin.feedback.index')
                ->with('success', __('messages.admin.feedbacks.update.success'));
        }

        return back()->with('error', __('messages.admin.feedbacks.update.fail'));
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
        $feedbacks = Feedback::destroy($feedback->id);

        if ($feedbacks) {
            // пост не был удален, а был помещен в корзину
            return redirect()->route('admin.feedback.index')
                ->with('success', __('messages.admin.feedbacks.destroy.success'));
        }

        return back()->with('error', __('messages.admin.feedbacks.destroy.fail'));
    }
}
