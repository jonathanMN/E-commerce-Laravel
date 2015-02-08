<?php

class ProductsController extends BaseController
{

	public function products()
	{
		return View::make('admin.products.list-products');
	}

}