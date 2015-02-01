<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel</title>

	<!-- Bootstrap core CSS -->
	{{ HTML::style('css/bootstrap.min.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('css/navbar-fixed-top.css') }}

    <!-- Font Awesome Icons -->
    {{ HTML::style('css/font-awesome.min.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	    {{ HTML::script('js/html5shiv.js') }}
	    {{ HTML::script('js/respond.min.js') }}
    <![endif]-->

</head>
<body>

	<div class="container">
		@include('layout.administrator.navigation')

		@if(Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
		@endif

		@if(Session::has('error-message'))
			<div class="alert alert-danger">
				{{ Session::get('error-message') }}
			</div>
		@endif

		@yield('content')

	</div><!-- /.container -->

	{{ HTML::script('js/jquery-1.10.2.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}

	@yield('page_scripts')

</body>
</html>