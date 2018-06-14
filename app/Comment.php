<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['user_id', 'commentable_id', 'commentable_type', 'body'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    
}
    public function commentable()
    {
    	return $this->morphTo();
    }
}
