@extends('master')
 
@section('content')

<form method="POST" action="{{url('/subscribe/store')}}" >
		<div class="form-group row"    >
			{{csrf_field()}}
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

	            <div class="col-md-6">
	                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

	                @if ($errors->has('email'))
	                    <span class="invalid-feedback">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
	            </div>
            </div>

        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    subscribe
                                </button>
                            </div>
                        </div>
</form>

@stop