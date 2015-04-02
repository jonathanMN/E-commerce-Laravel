@extends('layout.client.default')

@section('content')

	@foreach($products as $product)
		{{ Form::open(array('url' => URL::route('add-cart'), 'method' => 'post', 'class' =>'products_form')) }}
			<div class="col-md-3 col-sm-6">
				<div class="shop-item">
					<input type="hidden" name="product_id" value="{{ $product->id }}" />
					<div class="shop-item-image">
						<a href="page-product-details.html">{{ HTML::image('images/products/'.$product->image, $product->name, '') }}</a>
					</div>
					<div class="title">
						<h3><a href="page-product-details.html">{{ $product->name }}</a></h3>
					</div>
					<div class="price">
						P {{ $product->unit_cost }}
					</div>
					<div class="form-horizontal">
						<label class="col-md-4 control-label">
							Qty :
						</label>
						<div class="col-md-8">
							<select class="form-control" name="product_qty" required>
								@for ($i = 1; $i <= $product->quantity; $i++)
									<option>{{ $i }}</option>
								@endfor
							</select>
						</div>
						<br style="clear:both;" />
					</div>
					<p></p>
					<div class="actions">
						<button class="btn btn-small" type="submit"><i class="icon-shopping-cart icon-white"></i> Add to Cart</button>
					</div>
				</div>
			</div>
		{{ Form::close() }}
	@endforeach
	<br style="clear:both;" />

	<!-- Cart Modal -->
	<div class="modal fade" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Cart</h4>
				</div>
				<div class="modal-body">
				@if (Session::has('products_cart'))
					<table class="table">
						<thead>
							<tr>
								<th></th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Unit Cost</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach(Session::get('products_cart') as $cart_item) :
							$cart_product = Product::find($cart_item['product_id']);
						?>
							<tr>
								<td align="center"><img src="{{ URL::to('/images/products/').'/'.$cart_product->image }}" height="50px"></td>
								<td>{{ $cart_product->name }}</td>
								<td>{{ $cart_item['qty'] }}</td>
								<td>{{ $cart_product->unit_cost }}</td>
								<td>{{ number_format($cart_product->unit_cost * $cart_item['qty'], 2) }}</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				@else
					No items in cart.
				@endif
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> Checkout</button>
				</div>
			</div>
		</div>
	</div>
	<!-- END Cart Modal -->

@stop()