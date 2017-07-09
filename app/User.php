<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Tweet;
use App\Comment;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets()
    {
        return $this->hasMany('App\Tweet');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function sentMessages()
    {
        return $this->hasMany('App\Message', 'id', 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany('App\Message', 'id', 'recipient_id');
    }
}
