@extends('master')

@section('content')


<hr>
<div class="col-md-8">
<h4>Subscribers</h4>	
<h6>List of Subscribers</h6>

<div>
	<table class="table table-hover">
		<tr>
			<th>Subscriber_id</th>
			<th>Email</th>
			
		
		</tr>

		@foreach( $subscribers as $subscriber)

			<tr>
				
				<td>{{ $subscriber -> id}}<td>
				<td>{{ $subscriber -> email}}<td>
				<td>
					<input type="checkbox" name="select">
					<a href="{{url('send/message')}}"><button type="submit" class="btn btn-primary">
                                    {{ __('send') }}
                                </button></a>
				</td>
			</tr>

		@endforeach


	</table>
</div>
 





</div>




@stop