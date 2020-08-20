<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ideas;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $idea = Ideas::find(1);
        $idea->with('media')->get();
        return view('home', compact('idea'));
        return view('home');
    }
}
