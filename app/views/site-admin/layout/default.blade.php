<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel</title>

	<!-- Bootstrap core CSS -->
	{{ HTML::style('css/bootstrap.min.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('css/navbar-fixed-top.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	    {{ HTML::script('js/html5shiv.js') }}
	    {{ HTML::script('js/respond.min.js') }}
    <![endif]-->

</head>
<body>

	<div class="container">
		@include('layout.navigation')

		@if(Session::has('message'))
			<div class="alert alert-info">
				{{ Session::get('message') }}
			</div>
		@endif

		@yield('content')

		<!-- Main component for a primary marketing message or call to action -->
		<div class="jumbotron">
			<h1>Navbar example</h1>
			<p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
			<p>To see the difference between static and fixed top navbars, just scroll.</p>
			<p><a class="btn btn-lg btn-primary" href="../../components/#navbar">View navbar docs &raquo;</a></p>
		</div><!-- /.jumbotron -->

	</div><!-- /.container -->

	{{ HTML::script('js/jquery-1.10.2.js') }}
	{{ HTML::script('js/bootstrap.js') }}

</body>
</html>