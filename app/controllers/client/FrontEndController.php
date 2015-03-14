<?php

class FrontEndController extends BaseController
{
	public function viewProducts()
	{
		return 	View::make('client.index')
				->with('products', Product::all());
	}
}