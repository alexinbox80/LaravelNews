<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.order');
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
        $request->validate([
            'userName' => ['required', 'string', 'min:3', 'max:255'],
            'userPhone' => ['required', 'numeric', 'digits:10'],
            'userEmail' => ['required', 'email', 'min:5', 'max:255'],
            'userUrl' => ['required', 'url', 'min:5', 'max:255'],
            'userDescription' => ['required', 'string', 'min:5', 'max:255']
        ]);

        $userData = response()->json($request->only([
            'userName',
            'userPhone',
            'userEmail',
            'userUrl',
            'userDescription'
        ]));

        file_put_contents('file.txt', $userData . PHP_EOL . PHP_EOL, FILE_APPEND);

        return $userData;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
