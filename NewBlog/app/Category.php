<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function Posts(){

    	return $this->hasMany(Post::class)->orderBy('created_at');
    } 
}
