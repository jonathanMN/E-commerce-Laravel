<!-- Navigation & Logo-->
<div class="mainmenu-wrapper">
    <div class="container">
    	<div class="menuextras">
			<div class="extras">
				<ul>
					<li class="shopping-cart-items">
						<i class="glyphicon glyphicon-shopping-cart icon-white"></i>
						<a href="#" data-toggle="modal" role="button" data-target="#cart_modal">
							<b>
								@if (Session::has('products_cart'))
									{{ count(Session::get('products_cart')) }}
								@else
									{{ "0" }}
								@endif
							 items in Cart</b>
						</a>
					</li>
	        	</ul>
			</div>
        </div>
        <nav id="mainmenu" class="mainmenu">
			<ul>
				<li class="logo-wrapper"><a href="index.html"><h1>Cart</h1></a></li>
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">About</a>
				</li>
				<li>
					<a href="#">Products</a>
				</li>
				<li>
					<a href="#">Contacts</a>
				</li>
			</ul>
		</nav>
	</div>
</div>