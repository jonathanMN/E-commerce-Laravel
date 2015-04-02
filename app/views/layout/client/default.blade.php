<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
<![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8">
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9">
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>mPurpose - Multipurpose Feature Rich Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    {{ HTML::style('client/css/bootstrap.min.css') }}
    {{ HTML::style('client/css/icomoon-social.css') }}

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
    {{ HTML::style('client/css/leaflet.css') }}
	<!--[if lte IE 8]>
		{{ HTML::style('client/css/leaflet.ie.css') }}
	<![endif]-->
	{{ HTML::style('client/css/main.css') }}

	{{ HTML::script('client/js/modernizr-2.6.2-respond-1.1.0.min.js') }}
</head>
<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    @include('layout.client.navigation')

    <!-- Page Title -->
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Products List</h1>
				</div>
			</div>
		</div>
	</div>
    
    <div class="eshop-section section">
    	<div class="container">
			<div class="row">
				@yield('content')
			</div>
    	</div>
    </div>


    

    <!-- Javascripts -->
    {{ HTML::script('client/js/jquery.min.js') }}
    {{ HTML::script('client/js/bootstrap.min.js') }}
    {{ HTML::script('client/js/leaflet.js') }}
    {{ HTML::script('client/js/jquery.fitvids.js') }}
    {{ HTML::script('client/js/jquery.sequence-min.js') }}
    {{ HTML::script('client/js/jquery.bxslider.js') }}
    {{ HTML::script('client/js/main-menu.js') }}
    {{ HTML::script('client/js/template.js') }}

</body>
</html>