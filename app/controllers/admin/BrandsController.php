<?php

class BrandsController extends BaseController
{

	public function brands()
	{
		return 	View::make('admin.brands.list-brands')
				->with('brands', Brand::all());
	}

	public function newBrand()
	{
		$brand = Input::get('brand');
		$loop = count($brand) - 1;
		for ($i = 0; $i <= $loop; $i++)
		{
			$c_brand = Brand::create(array(
				'brand' => $brand[$i]
			));
			if ($c_brand && $i == $loop)
				return 	Redirect::route('list-brands')
						->with('message', 'Brand Successfully added.');
		}
	}

	public function viewBrand($id)
	{
		$v_brand = Brand::find($id);
		return json_encode($v_brand);
	}

	public function updateBrand()
	{
		$u_brand = Brand::find(Input::get('id'));
		$u_brand->brand = Input::get('brand');
		$u_brand->save();
		return 	Redirect::route('list-brands')
				->with('message', 'Record Updated');
	}

	public function deleteBrand1($id)
	{
		$brand = Brand::find($id);
		$brand->delete();
		return 	Redirect::route('list-brands')
				->with('message', 'Record Deleted');
	}

	public function deleteBrand2()
	{
		$id = Input::get('brand-ids');
		$loop = count($id) - 1;
		for ($i = 0; $i <= $loop; $i++)
		{
			$brand = Brand::find($id[$i]);
			$brand->delete();
			if ($brand && $i == $loop)
				return 	Redirect::route('list-brands')
						->with('message', 'Record/s Deleted');
		}
	}

}