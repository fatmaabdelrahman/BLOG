@extends('master')

@section('content')
<div class="col-md-8">
	
    <h3>Login</h3>

    <form method="post" action="{{url('/login')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control form-app" placeholder="Email Address">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control form-app" placeholder="Pawword">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-submit">Login</button>
        </div>

    </form>
<div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>


</div>



@stop