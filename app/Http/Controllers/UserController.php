<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{	

	public function __construct()
    {
          $this->middleware('auth');
    }
    
    public function  index(User $user)
    {

        return view('users.index', [
            'user' => $user
        ]);
    }
}
