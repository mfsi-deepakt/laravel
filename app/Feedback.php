<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{

	protected $fillable = ['title', 'body'];

	public function comments() {
    	return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {	
    	return $this->comments()->create([
    		'body' => $body,
    		'user_id' => auth()->id(),
    	]);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
