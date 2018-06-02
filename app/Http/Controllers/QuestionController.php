<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        if(Auth::check()) {
            $questionId = Question::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'body' => request('body')
            ])->id;
            return redirect('/questions/'.$questionId);
        }

        return back();
    }

    public function show(Question $question)
    {
    	return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
    	if(Auth::check() && $question->user_id == Auth::id()) {
            session()->flash('id', $question->id);
            return view('questions.edit', compact('question'));
        } else if(Auth::check()) {
        	dd("Error: you don't own this question.");
        	// Error: you don't own this question.
        	// Redirect back to homepage.
        }

    }

    public function update(Request $request)
    {
    	$questionId = session('id');
    	$question = Question::find($questionId);
    	if($question->user_id == Auth::id()) {
	    	$question->update([
	            "title" => $request->title,
	            "body" => $request->body
	        ]);
	    }

	    redirect('showQuestion');
    }
}
