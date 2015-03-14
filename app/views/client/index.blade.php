@extends('layout.client.default')

@section('content')
	<table>	
	@foreach($products as $product)
		{{ Form::open(array('url' => URL::route('add-cart'), 'method' => 'post', 'class' =>'products_form')) }}
			<tr>
				<td>{{ $product->name }}</td>
				<td>
					<input type="hidden" name="product_id" value="{{ $product->id }}" />
					<input type="text" name="product_qty" />
				</td>
				<td><button type="submit">Add to cart</button></td>
			</tr>
		</form>
		{{ Form::close() }}
	@endforeach
	</table>

	@if (Session::has('products_cart'))
		<pre>
			{{ print_r(Session::get('products_cart')) }}
		</pre>
	@endif

@stop()