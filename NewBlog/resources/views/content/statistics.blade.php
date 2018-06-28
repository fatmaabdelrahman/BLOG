@extends('master')

@section('content')

<div class="col-md-8">

	<h1 class="page-header">
		Statistics
		<small>Website Statistics</small>
	</h1>

     <div>
     	
     	<table class="table table-hover">
     		<tr>
     			<td>All Users</td>
     			<td>{{$users}}</td>
     		</tr>
     		<tr>
     			<td>All Posts</td>
     			<td>{{$posts}}</td>
     		</tr>
     		<tr>
     			<td>All Comments</td>
     			<td>{{$comments}}</td>
     		</tr>
     		<tr>
     			<td>Most Active users</td>
     			<td></td>
     		</tr>


     	</table>

     </div> 
	                
	</div>				


@stop