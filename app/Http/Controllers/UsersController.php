<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function show(User $user)
    {
    	$tweets = User::find($user->id)->tweets;
    	return view('users.show', compact('user', 'tweets'));
    }
}
