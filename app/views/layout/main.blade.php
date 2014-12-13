<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel Authentication system</title>
	{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
	{{ HTML::style('css/main.css') }}
</head>
<body>
	
	<div class="container">
		<div class="col-md-4 col-md-offset-4">
			{{ HTML::image('img/laravel.png', 'Laravel Logo', array('class' => 'logo')) }}
			<h1>Laravel Authentication</h1>
		</div>
	</div>

	<div class="container">
		<div class="col-md-4 col-md-offset-4" id="auth-body">
			
			@if (Session::has('global'))
				<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span>{{ Session::get('global') }}<span>
				</div>
			@endif			

			@include('partials/nav')
			
			@yield('content')
		</div>
	</div>

</body>
</html>