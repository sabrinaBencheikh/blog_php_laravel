<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table = 'posts';
    public function auth(){

        return $this->belongsTo('App\User', 'user_id');
    }
}
