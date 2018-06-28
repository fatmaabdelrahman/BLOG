<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
         'body','post_id'
    ];


    public function post(){

    	return $this->belongsTo(Post::class);
    }
     public function post_id(){

        return $this->hasOne('App\Post','id','post_id');
    }


     public function user(){

    	return $this->belongsTo(User::class);
    }
}
