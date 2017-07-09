<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tweet;
use App\User;

class Comment extends Model
{
    protected $guarded = [];

    public function tweet()
    {
    	return $this->belongsTo('Tweet');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
