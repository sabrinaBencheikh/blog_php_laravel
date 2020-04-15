<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $guarded = [];
    protected $table = 'comments';

    public function user(){

        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function post(){

        return $this->belongsTo('App\Models\Post', 'post_id');
    }

    public function commentable(){

        return $this->morphTo();
    }

    public function comments(){

       return $this->morphMany('App\Models\Comment', 'commentable')->latest();
    }
}
