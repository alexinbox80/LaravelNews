<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profiles\EditRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = User::query()->paginate(config('pagination.admin.profiles'));

        return view('admin.profiles.index', [
            'profiles' => $profiles
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
     * @param  User $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $profile)
    {
        return view('admin.profiles.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param User $profile
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $profile): RedirectResponse
    {
        $profile = $profile->fill($request->validated());

        if($profile->fill([
                'password' => Hash::make($request['password'])
            ])->save()) {

            return redirect()->route('admin.profiles.index')
                ->with('success',  __('messages.admin.profile.update.success'));
        }

        return back()->with('error', __('messages.admin.profile.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $profile
     *
     * @return JsonResponse
     */
    public function destroy(User $profile): JsonResponse
    {
        try {
            $deleted = $profile->delete();
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
