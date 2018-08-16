<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Comment;
use App\Events\CommentAdded;

class CommentController extends Controller
{	

	public function __construct()
    {
          $this->middleware('auth');
    }
    
    public function  store(Feedback $feedback)
    {

    	$this->validate(request(), [
            'body' => 'required | max : 500 | min :10'
        ]);
    	$comment = $feedback->addComment(request('body'));
        event(new CommentAdded($comment));
    	return back();
    }
}
