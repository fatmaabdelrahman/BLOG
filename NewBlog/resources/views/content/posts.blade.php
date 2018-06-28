@extends('master')

@section('content')
<h1 class="page-header"> 

		<h3>  Please share your favorite writer here.. </h3>
		<form  method="Post" action="{{url('/posts/store')}}"  enctype="multipart/form-data" > 
                 {{csrf_field()}} 
                 	<div class="form-group"> 
	                 	  <label for="email">Title</label>   
					      <input type="text"name="title"  id="title" placeholder="Type title.." class="form-control">
				    </div>

				    <div class="form-group"> 
				      <label for="body">Body</label>
				      <textarea name="body" id="body"  placeholder="type post contenet.."class="form-control"></textarea>
				  </div>

				  <div class="form-group"> 
				      <label for="url">Image</label>
				      <input id="url" type="file"  name="url" >
				  </div>

				   <div class="form-group"> 
				      <button type="submit"class="btn btn-primary">Add Post</button>   
    				</div> 

    		</form>
                    <hr>
                </h1>
				@foreach($posts as $post)

	                <!-- First Blog Post -->
	                <h2>
	                    <a href="{{url('posts/'.$post->id)}}"> {{$post->title}}</a>
	                </h2>
	                 <p><span class="glyphicon glyphicon-time"></span> 
	                Posted on {{$post->created_at->toDayDateTimeString()}} <strong>Categoty:</strong>
	                @if($post->category)
	                {{ $post->category->name }}
	                @else
	                <b> not categorized yet !! </b>
	                @endif

	                

	             </p>

	                @if ($post->url)
	                <p><img src="upload/{{$post-> url}}"></p>
	                @endif 

	               
	                <!-- <hr> -->
	                <hr>
	                <p>{{$post->body}}</p>
	                <a class="btn btn-primary" href="{{url('posts/'.$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> <hr>
	                <hr>       

                @endforeach
                 <hr>
                 

                 
    		<div>
    			@foreach($errors->all() as $error)
    			{{$error}} <br>
    			@endforeach
    		</div>

                 <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->


@stop