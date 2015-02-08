<?php

class CategoriesController extends BaseController
{

	public function categories()
	{
		return 	View::make('admin.categories.list-categories')
				->with('categories', Category::all());
	}
	
	public function newCategory()
	{
		$cat = Input::get('category');
		$main_cat = Input::get('main_category');
		$loop = count($cat) - 1;
		print_r(Input::all());
		for ($i = 0; $i <= $loop; $i++)
		{
			$main_category = ($main_cat[$i] == "null") ? null : $main_cat[$i];
			$category = Category::create(array(
				'category' 		=> $cat[$i],
				'main_category' => $main_category
			));
			if ($category && $i == $loop)
				return 	Redirect::route('list-categories')
						->with('message', 'Category Added');
		}
	}

	public function viewEdit($id)
	{
		$val = Category::find($id);
		return json_encode($val);
	}

	public function updateCategory()
	{	
		$main_cat = Input::get('main_category');
		$cat = Category::find(Input::get('id'));
		$cat->category = Input::get('category');
		$cat->main_category = ($main_cat == "null") ? null : $main_cat;
		$cat->save();
		return 	Redirect::route('list-categories')
				->with('message', 'Category Successfully Updated');
	}

	public function deleteCategory1($id)
	{
		$cat = Category::find($id);
		$cat->delete();
		return 	Redirect::route('list-categories')
				->with('message', 'Category Deleted');
	}

	public function deleteCategory2()
	{
		$id = Input::get('catids');

		$loop = count($id) - 1;
		for ($i = 0; $i <= $loop; $i++)
		{
			$cat = Category::find($id[$i]);
			$cat->delete();
			if ($cat && $i == $loop)
				return 	Redirect::route('list-categories')
						->with('message', 'Record/s Deleted');
		}
	}

}