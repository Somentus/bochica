<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Question;
use App\Answer;
use App\Comment;
use App\Tag;
use App\Vote;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $questions = Question::orderBy('id', 'asc')->get();
        return view('questions.index', compact('questions'));
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
        if(Auth::check()) {
            if($question->user_id == Auth::id()) {
                // User owns question
                return view('questions.show', compact('question'));     
            } else {
                // User does not own question
                return view('questions.show', compact('question'));
            }
        } else {
            // Visitor is not logged in
    	   return view('questions.show', compact('question'));
        }
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

	    return redirect('/questions/'.$questionId);
    }

    public function destroy(Question $question)
    {
        if($question->user_id == Auth::id()) {
            $question->delete();
        }

        return redirect('/questions/');
    }

    public function vote(Question $question, Request $request)
    {
        if(Auth::check()) {
            $vote = Vote::where('user_id', Auth::id())->where('votable_id', $question->id)->where('votable_type', 'Question')->first();
            if($vote) {
                if($vote->score){
                    if($request->flag == "up"){
                        $vote->delete();
                    } else {
                        $vote->score = 0;
                        $vote->save();
                    }
                } else {
                    if($request->flag == "up"){
                        $vote->score = 1;
                        $vote->save();
                    } else {
                        $vote->delete();
                    }
                }
            } else {
                if($request->flag == "up") {
                    $score = 1;
                } else {
                    $score = 0;
                }

                $vote = Vote::create([
                    'user_id' => Auth::id(),
                    'score' => $score,
                    'votable_id' => $question->id,
                    'votable_type' => 'Question',
                ]);
            }
        }

        return redirect('/questions/'.$question->id);
    }
}
