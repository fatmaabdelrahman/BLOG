<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

use App\Post;
use App\Comment;
use Validator;


class PostController extends Controller
{
	//to show posts

	public function posts()
	{
		$all_posts = Post::WithCount('Comments_count')->orderBy('created_at')->paginate(3);
		
		return response(['all_posts'=>$all_posts]);


	}

	//show post with comments 
	public function post( $id)
	{
		// $post =Post::with('Comments')->find($id);
		$post =Post::find($id);
		$comment= $post ->comments()->paginate(3);

		return !empty($post) ? response(['status'=>true, compact('post','comment')]) : response(['status'=>false]);
	}

	// create posts

	public function add_post(Request $request)
	{
			 $data= $request->all();
        
        //validations
        $rules=[
            'title'=>'required',
            'body'=>'required',
            'url'=>'image|mimes:jpg,jepg,gif,png',
        ]; 
        $validator= Validator::make($data,$rules);


        //Add data to DB
        //mg_name = time(). "." .$request->url->getClientOriginalExtension();
    	$post = new Post;
    	$post->title = request('title');
    	$post->body = request('body');
        $post->url=request('url');
        $post->save();
       //request->url->move(public_path('upload')); 
        //we can also  use creat method == Post::create(request()->all()); instead of object method
    	  if ($post->save()) 
    	  {
            $response = [
                'msg' => 'Post created',
                'user' => $post
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => 'An error occurred'
        ];

        return response()->json($response, 404);	
      }
		

	//create comments

	public function add_comment(Post $post)
	{
		comment::Create([
    		'body'=>request('body'),
    		'post_id'=> $post->id

    	]);

    	return response()->json(['status'=>'success', 'messages'=>'comment added']);

	}
}