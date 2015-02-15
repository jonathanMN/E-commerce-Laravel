<?php

class ProductsController extends BaseController
{

	public function products()
	{
		return 	View::make('admin.products.list-products')
				->with('categories', Category::all())
				->with('products', Product::all())
				->with('brands', Brand::all());
	}

	public function addProduct()
	{
		$image = Input::file('image')->getClientOriginalName();
		$destinationPath = 'images/';
		$prod = Product::create(array(
			'category_id' 	=> Input::get('category'),
			'brand_id' 		=> Input::get('brand'),
			'name' 			=> Input::get('product'),
			'description' 	=> Input::get('description'),
			'image' 		=> $image,
			'quantity' 		=> Input::get('quantity'),
			'unit_cost' 	=> Input::get('unit_cost')
		));
		Input::file('image')->move($destinationPath, $image);

		if ($prod)
			return 	Redirect::route('list-products')
					->with('message', 'Product Added');
	}

}