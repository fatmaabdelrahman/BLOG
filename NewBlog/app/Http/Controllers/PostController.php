<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Category;
use App\User;
use App\Role;
use App\Comment;
use Validator;


class PostController extends Controller
{
    // to show posts
    public function posts(){ 
    	$posts = Post::all();
        // dd($posts);
    	return view('content.posts', compact('posts'));
        }

    // for one post
    public function post(Post $post){
    	//$post = DB::table('posts')->find($post); // to retrieve  post or find post from DB
    	 $stop_comment=DB::table('settings')->where('name','stop_comment')->value('value');
          $stop_register=DB::table('settings')->where('name','stop_register')->value('value');
        return view('content.post',compact('post','stop_comment')); 
        }


    public function store(Request $request){
    	$data= $request->all();
        
        //validations
        $rules=[
            'title'=>'required',
            'body'=>'required',
            'url'=>'image|mimes:jpg,jepg,gif,png',
        ]; 
        $validator= Validator::make($data,$rules);


        //Add data to DB
        $img_name = time(). "." .$request->url->getClientOriginalExtension();
    	$post = new Post;
    	$post->title = request('title');
    	$post->body = request('body');
        $post->url= $img_name; // instead of image
        $post-> save();
        $request->url->move(public_path('upload'), $img_name); 
        //we can also  use creat method == Post::create(request()->all()); instead of object method
    	return redirect('/posts');
        }


     // to show categoties
      public function category($name)
      {   
       // $posts= post::with('category')->get();
        $cat= DB::table('categories')-> where('name', $name)->value('id');
        $posts=DB::table('posts')->where('category_id', $cat)->get();
        return view('content.category',compact('posts'));
        }

// user roles
        // for admin
    public function admin()
    {
     //to get all users from data base
     $users =User::all();  
     $stop_comment=DB::table('settings')->where('name','stop_comment')->value('value');
      $stop_register=DB::table('settings')->where('name','stop_register')->value('value');
        return view('content.admin',compact('users','stop_comment','stop_register') );
    }

    //settings== stop comments,registering,posting, as you like
    public function settings(Request $request)
    {
        if($request->stop_comment)
        {
            DB::table('settings')->where('name','stop_comment')->update(['value'=>1]);
        }
        else
        {
            DB::table('settings')->where('name','stop_comment')->update(['value'=>0]);

        }
        if($request->stop_register)
        {
            DB::table('settings')->where('name','stop_register')->update(['value'=>1]);
        }
        else
        {
            DB::table('settings')->where('name','stop_register')->update(['value'=>0]);

        }

        return redirect()->back();
    }

      // to add roles 
    public function addRole( Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user ->roles()->detach();

        if($request['role_user'])
        {
            $user->roles()->attach(Role::where('name','User')->first());
        }
         if($request['role_editor'])
        {
            $user->roles()->attach(Role::where('name','Editor')->first());
        }
         if($request['role_admin'])
        {
            $user->roles()->attach(Role::where('name','Admin')->first());
        }

        return redirect()->back();
    }

    public function editor()
    {
        return view('content.editor');
    }

    public function accsessDenied()
    {
        return view('content.access_denied');
    }


    public function statistics()
    {   
        $users=   DB::table('users')->count();
        $posts=   DB::table('posts')->count();
        $comments=DB::table('comments')->count();

        $most_comments=User::withCount('comments')->orderBy('comments_count','desc')->first();
       // dd($most_comments->comments_count);

        

        return view('content.statistics', compact('users','posts','comments','most_comments'));
    }

}
