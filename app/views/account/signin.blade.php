@extends('layout.main')

@section('content')
		<form action="{{ URL::route('account-sign-in-post') }}" method="post">
			<div class="form-group">
				Email: <input type="text" name="email"{{ (Input::old('email')) ? ' value="' . Input::old('email') . '"' : '' }} class="form-control input-sm">
				@if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
			</div>
			<div class="form-group">
				Password: <input type="password" class="form-control input-sm" name="password">
				@if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
			</div>
			<div class="checkbox">
				<label for="remember">
					<input type="checkbox" name="remember" id="remember"> Remember me
				</label>
			</div>
			<input type="submit" class="btn btn-sm btn-primary" value="Sign in">
			{{ Form::token() }}
		</form>
@stop