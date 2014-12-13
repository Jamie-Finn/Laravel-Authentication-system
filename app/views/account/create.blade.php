@extends('layout.main')

@section('content')
	<form action="{{ URL::route('account-create-post') }}" method="post">
		<div class="form-group">
			Email: <input type="text" name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }} class="form-control input-sm">
			@if($errors->has('email')) 
				{{ $errors->first('email') }}
			@endif
		</div>

		<div class="form-group">
			Username: <input type="text" name="username"{{ (Input::old('username')) ? ' value="' . e(Input::old('username')) . '"' : '' }} class="form-control input-sm">
			@if($errors->has('username')) 
				{{ $errors->first('username') }}
			@endif
		</div>

		<div class="form-group">
			Password: <input type="password" name="password" class="form-control input-sm">
			@if($errors->has('password')) 
				{{ $errors->first('password') }}
			@endif
		</div>

		<div class="form-group">
			Password again: <input type="password" name="password_again" class="form-control input-sm">
			@if($errors->has('password_again')) 
				{{ $errors->first('password_again') }}
			@endif
		</div>

		<input type="submit" class="btn btn-sm btn-primary" value="Create account">
		{{Form::token() }}
	</form>
@stop