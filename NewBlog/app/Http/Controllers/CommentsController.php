<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Comment;
use App\Post; 
class CommentsController extends Controller
{
    public function store(Post $post){
    	comment::Create([
    		'body'=>request('body'),
    		'post_id'=> $post->id

    	]);

    	return back();
    }



}
