<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        //about page

        $about = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cupiditate ducimus eos facilis harum odit quisquam
                  ut! Blanditiis dignissimos dolore eligendi enim, eos esse hic illum magnam pariatur ratione recusandae ut.
                  Accusantium alias assumenda beatae commodi consectetur culpa dolore doloremque dolores dolorum ea eum ex, fugiat
                  fugit, hic illum incidunt iure iusto necessitatibus nemo nostrum numquam obcaecati praesentium, provident qui
                  quibusdam quisquam sapiente similique totam unde vero. Ad alias autem culpa debitis deserunt doloribus ducimus
                  eligendi, est facilis illum in labore minus nam nulla obcaecati officiis omnis pariatur placeat possimus provident
                  quam ratione repudiandae sed sit sunt totam ut. Alias!";

        return view('news.showAbout', [
            'about' => $about
        ]);
    }
}
