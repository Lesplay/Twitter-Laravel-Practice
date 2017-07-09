<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Tweet;
use Auth;

class CommentsController extends Controller
{
    public function store()
    {
    	$this->validate(request(), [
    		'text' => 'required|min:1|max:140',
    	]);

    	Comment::create([
    		'user_id' => Auth::user()->id,
    		'tweet_id' => request('tweet_id'),
    		'text' => request('text')
    	]);

    	$tweetId = request('tweet_id');

    	return redirect()->route('tweetShow', [$tweetId]);
    }
}