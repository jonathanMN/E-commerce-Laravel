<?php

class CartController extends BaseController
{

	public function addUpdateCart()
	{
		$product_id = Input::get('product_id');
		$product_qty = Input::get('product_qty');

		$new_cart = array(
			array(
				'product_id' => $product_id,
				'qty' => $product_qty
			)
		);

		if (Session::has('products_cart'))
		{
			$exist = false;
			foreach (Session::get('products_cart') as $cart_item) //loop through session array
			{
				// the item exist in array
				if ($cart_item["product_id"] == $product_id)
				{
					$cart[] = array('product_id' => $cart_item["product_id"], 'qty' => $product_qty);
					$exist = true;
				}
				// item doesn't exist in the list
				else
				{
					$cart[] = array('product_id' => $cart_item["product_id"], 'qty' => $cart_item["qty"]);
				}
			}
			// found user item in array list, update quantity
			if ($exist)
			{
				Session::put('products_cart', $cart);
			}
			// add new user item in array
			else
			{
				Session::put('products_cart', array_merge($cart, $new_cart));
			}
		}
		// create a new session if does not exist
		else
		{
			Session::put('products_cart', $new_cart);
		}

		return Redirect::route('client-products-page');
	}

}