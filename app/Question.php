<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id', 'title', 'body'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function answers()
    {
    	return $this->hasMany('App\Answer');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
