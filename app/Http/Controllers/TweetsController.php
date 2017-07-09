<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Auth;

class TweetsController extends Controller
{
    public function index()
    {
    	$allTweets = Tweet::all()->sortByDesc('created_at');

   		return view('main', compact('allTweets'));
    }

    public function show(Tweet $tweet)
    {
        $comments = Tweet::find($tweet->id)->comments->sortByDesc('created_at');
    	return view('tweets.show', compact('tweet', 'comments'));
    }

    public function create()
    {
    	return view('tweets.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'text' => 'required|min:1|max:140',

    	]);

    	Tweet::create([
    		'user_id' => Auth::user()->id,
    		'text' => request('text')
    	]);

    	return redirect('/');
    }
}
