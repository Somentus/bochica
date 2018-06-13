<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
    	$questions = Question::orderBy('id', 'asc')->get();
        return view('home', compact('questions'));
    }
}
