@extends('layout.main')

@section('content')
	<form action="{{ URL::route('account-reset-password-post') }}" method="post">
	    <input type="hidden" name="token" value="{{ $token }}">
	    
	    <div class="form-group">
	    	Email: <input type="email" name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }} class="form-control input-sm">
	    </div>
	    
	    <div class="form-group">
	    	Password: <input type="password" name="password" class="form-control input-sm">
		</div>

		<div class="form-group">
	    	Password again: <input type="password" name="password_confirmation" class="form-control input-sm">
		</div>
	    
	    <input type="submit" class="btn btn-sm btn-primary" value="Reset Password">
	</form>
@stop