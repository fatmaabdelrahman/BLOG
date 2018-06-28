@extends('master')

@section('content')

<hr> <hr>
<h1> <a href="{{url('posts')}}"> </h1>

	                <!-- First Blog Post -->
	                <h2>
	                    <a href="#">{{$post->title}}</a>
	                </h2>
	                
	                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>
	                <!-- <hr> -->
	                <hr>

                   @if ($post->url)
	                <p><img src="../upload/{{$post-> url}}"></p>
	                @endif 

	                <p>{{$post-> body}}</p>

               	
           @if($stop_comment ==1)  
           <h3>Oops!!Comments Are Currently Closed !!</h3>  		
           @else
            <form  method="Post" action="{{url('posts/'.$post->id.'/store')}}"  > 
	                    {{csrf_field()}} 
	                 	<hr>
					    <div class="form-group"> 
					      <label for="body">Wrire Something ..</label>
					      <textarea name="body" id="body" class="form-control"></textarea>
					  </div>

					   <div class="form-group"> 
					      <button type="submit"class="btn btn-primary">Add Comment </button>   
	    				</div> 

    		</form>
	             @endif
					@foreach ( $post->comments as $comment )
               			<p class="comment">{{ $comment->body }}</p>
               		@endforeach 
            
                 <!-- Pager 
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>-->


@stop