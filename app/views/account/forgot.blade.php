@extends('layout.main')

@section('content')
	<form action="{{ URL::route('account-forgot-password-post') }}" method="post">
	    <div class="form-group">
	    	Email: <input type="email" name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }} class="form-control input-sm">
	    </div>
	    
	    <input type="submit" class="btn btn-sm btn-primary" value="Send Reminder">
	</form>
@stop