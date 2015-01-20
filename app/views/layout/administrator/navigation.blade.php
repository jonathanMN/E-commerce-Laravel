<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Project name</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Dashboard</a></li>
				<li><a href="#about">Accounts</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Add New Product</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Brands</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					@if(Auth::check())
						Hello, {{ Auth::user()->username }}
					@endif
					<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Settings</a></li>
						<li><a href="#">Account</a></li>
						<li class="divider"></li>
						<li><a href="{{ URL::route('sign-out') }}">Sign Out</a></li>
					</ul>
				</li>
			</ul>

		</div><!--/.nav-collapse -->
	</div><!-- /.container -->
</div><!-- /.navbar -->