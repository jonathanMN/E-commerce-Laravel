<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">E-commerce</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::route('dboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li>
					<a href="{{ URL::route('list-users') }}"><i class="fa fa-group"></i> Users</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-copy"></i> Content <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="{{ URL::route('list-products') }}"><i class="fa fa-crosshairs"></i> Products</a></li>
						<li><a href="{{ URL::route('list-categories') }}"><i class="fa fa-list-ul"></i> Categories</a></li>
						<li><a href="{{ URL::route('list-brands') }}"><i class="fa fa-qrcode"></i> Brands</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user"></i>
						@if(Auth::check())
							Welcome, <b>{{ Auth::user()->username }}</b>
						@endif
					<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
						<li><a href="#"><i class="fa fa-file-text-o"></i> Profile</a></li>
						<li class="divider"></li>
						<li><a href="{{ URL::route('sign-out') }}"><i class="fa fa-power-off"></i> Sign Out</a></li>
					</ul>
				</li>
			</ul>

		</div><!--/.nav-collapse -->
	</div><!-- /.container -->
</div><!-- /.navbar -->