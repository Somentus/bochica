<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id', 'question_id', 'body'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function question()
    {
    	return $this->belongsTo('App\Question');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function upvotes()
    {
        $upvotes = Vote::where('votable_id', $this->id)->where('votable_type', 'Answer')->where('score', 1)->count();
        return $upvotes;
    }

    public function downvotes()
    {
        $downvotes = Vote::where('votable_id', $this->id)->where('votable_type', 'Answer')->where('score', 0)->count();
        return $downvotes;
    }
}
