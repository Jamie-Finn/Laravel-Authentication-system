@extends('layout.main')

@section('content')
	<form action="{{ URL::route('account-change-password-post') }}" method="post">
		<div class="form-group">
			Old password: <input type="password" name="old_password" class="form-control input-sm">
			@if($errors->has('old_password'))
				{{ $errors->first('old_password') }}
			@endif
		</div>
		<div class="form-group">
			New password: <input type="password" name="password" class="form-control input-sm">
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>
		<div class="form-group">
			New password again: <input type="password" name="password_again" class="form-control input-sm">
			@if($errors->has('password_again'))
				{{ $errors->first('password_again') }}
			@endif
		</div>
		<input type="submit" class="btn btn-sm btn-primary" value="Change password">
		{{ Form::token() }}
	</form>
@stop