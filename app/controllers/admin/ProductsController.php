<?php

class ProductsController extends BaseController
{

	public function products()
	{
		return 	View::make('admin.products.list-products')
				->with('products', Product::productsRecord())
				->with('categories', Category::all())
				->with('brands', Brand::all());
	}

	public function addProduct()
	{
		$image = explode('.', Input::file('image')->getClientOriginalName());
		$new_img_name = productMax().'.'.$image[1];
		$destinationPath = 'images/products/';
		$prod = Product::create(array(
			'category_id' 	=> Input::get('category'),
			'brand_id' 		=> Input::get('brand'),
			'name' 			=> Input::get('product'),
			'description' 	=> Input::get('description'),
			'image' 		=> $new_img_name,
			'quantity' 		=> Input::get('quantity'),
			'unit_cost' 	=> Input::get('unit_cost')
		));
		Input::file('image')->move($destinationPath, $new_img_name);

		if ($prod)
			return 	Redirect::route('list-products')
					->with('message', 'Product Added.');
	}

	public function editView($id)
	{
		return json_encode(Product::find($id));
	}

	public function updateProduct()
	{
		$product = Product::find(Input::get('id'));
		$product->category_id = Input::get('category');
		$product->brand_id = Input::get('brand');
		$product->name = Input::get('product');
		$product->description = Input::get('description');
		$product->quantity = Input::get('quantity');
		$product->unit_cost = Input::get('unit_cost');
		$product->save();
		return 	Redirect::route('list-products')
				->with('message', 'Product Update.');
	}

	public function changeProductImg()
	{
		$id = Input::get('img_id');
		$image = explode('.', Input::file('image')->getClientOriginalName());
		$new_img_name = $id.'.'.$image[1];
		$destinationPath = 'images/products/';

		$product = Product::find($id);
		$product->image = $new_img_name;
		$product->save();

		Input::file('image')->move($destinationPath, $new_img_name);

		return json_encode(array('success' => 'true'));
	}

	public function deleteProduct1($id)
	{
		$product = Product::find($id);
		$product->delete();
		return 	Redirect::route('list-products')
				->with('message', 'Product Deleted.');
	}

	public function deleteProduct2()
	{
		$id = Input::get('p_id');
		$loop = count($id) - 1;
		for ($i = 0; $i <= $loop; $i++)
		{
			$d_prod = Product::find($id[$i]);
			$d_prod->delete();
			if ($d_prod && $i == $loop)
				return 	Redirect::route('list-products')
						->with('message', 'Product/s Deleted.');
		}
	}

}