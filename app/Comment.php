<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{	

	protected $fillable = ['body', 'user_id'];

    public function feedback()
    {
    	return $this->belongsTo(Feedback::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
