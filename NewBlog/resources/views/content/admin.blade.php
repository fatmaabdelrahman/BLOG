@extends('master')

@section('content')


<hr> <hr>
<div class="col-md-8">
<h4>Control panel</h4>	
<h6>List of Users</h6>

<div>
	<table class="table table-hover">
		<tr>
			<th>User_id</th>
			<th>Name</th>
			<th>Email</th>
			<th>User</th>
			<th>Editor</th>
			<th>Admin</th>
		</tr>
		@foreach ($users as $user)
		<form method="post" action="{{url('add-role')}}">
			{{ csrf_field() }}

			<input type="hidden" name="email" value="{{ $user->email }}">
			<tr>
				<th>{{$user->id}}</th>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>
					<input type="checkbox" name="role_user"onChange="this.form.submit()" {{$user->hasRole('User')?  'checked': ' '}} >
				</td>
				<td>
					<input type="checkbox" name="role_editor" onChange="this.form.submit()" {{$user->hasRole('Editor')?  'checked': ' '}} >
				</td>
				<td>
					<input type="checkbox" name="role_admin"onChange="this.form.submit()" {{$user->hasRole('Admin')?  'checked': ' '}} >
				</td>
			</tr>	
	</form>
		@endforeach

	</table>
</div>
<div>
	<form method="post" action="{{url('settings')}}">
	{{csrf_field()}}
	Stop comment: <input type="checkbox" name="stop_comment" onChange="this.form.submit()"  {{$stop_comment ==1 ?  'checked': ' '}}>
	Stop Registeration: <input type="checkbox" name="stop_register" onChange="this.form.submit()"  {{$stop_register ==1 ?  'checked': ' '}}>

</form>
</div>
 





</div>




@stop