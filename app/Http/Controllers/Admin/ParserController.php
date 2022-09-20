<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use App\Models\Resource;
use App\Jobs\JobNewsParsing;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @param  Parser $parser
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = Resource::all()->pluck('url')->toArray();

        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url));
        }

       // return redirect()->route('admin.index')
       //         ->with('success', __('messages.admin.resource.create.success'));

        return back()->with('success', __('messages.admin.resource.create.success'));
    }
}
