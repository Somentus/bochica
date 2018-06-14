<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	protected $fillable = ['user_id', 'score', 'votable_type', 'votable_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
	}

    public function votable()
    {
    	return $this->morphTo();
    }
}
