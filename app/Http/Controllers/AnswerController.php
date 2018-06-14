<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Question;
use App\Answer;
use App\Comment;
use App\Tag;
use App\Vote;

class AnswerController extends Controller
{
    public function vote(Answer $answer, Request $request)
    {
        if(Auth::check()) {
        	$vote = Vote::where('user_id', Auth::id())->where('votable_id', $answer->id)->where('votable_type', 'Answer')->first();
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
	                'votable_id' => $answer->id,
	                'votable_type' => 'Answer',
            	]);
        	}
        }

        return redirect('/questions/'.$answer->question->id);
    }
}
