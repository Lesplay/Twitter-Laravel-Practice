<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Auth;

class MessagesController extends Controller
{
    public function show($user)
    {
    	$sentMessages = Message::where('sender_id', '=', $user)->get()->sortByDesc('created_at');
    	$receivedMessages = Message::where('recipient_id', '=', $user)->get()->sortByDesc('created_at');

    	return view('messages.show', compact('sentMessages', 'receivedMessages'));
    }

    public function store()
    {
    	$this->validate(request(), [
    		'text' => 'required|min:1|max:140',
    	]);

    	//If statement to separate sending a new message from the reply
    	if(request('recipient_name')) {
    		$recipientName = filter_input(INPUT_GET, request('recipient_name'), FILTER_SANITIZE_STRING);

    		Message::create([
    		'sender_id' => Auth::user()->id,
    		'recipient_id' => User::where('name', request('recipient_name'))->first()->id,
    		'text' => request('text')
    		]);

    		return redirect()->route('userMessages', [Auth::user()->id]);
    	} else {
    		Message::create([
    		'sender_id' => Auth::user()->id,
    		'recipient_id' => request('recipient_id'),
    		'text' => request('text')
    		]);

    		return redirect()->route('userMessages', [Auth::user()->id]);
    	}
    }
}
