<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

	<!-- Bootstrap core CSS -->
	{{ HTML::style('css/bootstrap.min.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('css/signin.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	    {{ HTML::script('js/html5shiv.js') }}
	    {{ HTML::script('js/respond.min.js') }}
    <![endif]-->

</head>
<body>

	<div class="container">

		@yield('content')

		@if(Session::has('message'))
			<div class="alert alert-info col-md form-signin">
				{{ Session::get('message') }}
			</div>
		@endif

		@if(Session::has('error-message'))
			<div class="alert alert-danger form-signin">
				{{ Session::get('error-message') }}
			</div>
		@endif

	</div><!-- /.container -->

	{{ HTML::script('js/jquery-1.10.2.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}

</body>
</html>