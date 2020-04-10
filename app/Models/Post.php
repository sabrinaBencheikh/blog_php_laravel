<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

   protected $guarded = []; 
   protected $table = 'posts';
   
    public function user(){

        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function comments(){

        return $this->hasMany('App\Models\Comment');
    }
}
