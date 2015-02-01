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

		$loop = count($cat) - 1;
		for ($i = 0; $i <= $loop; $i++)
		{
			$category = Category::create(array(
				'category' => $cat[$i]
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
		$cat = Category::find(Input::get('id'));
		$cat->category = Input::get('category');
		$cat->save();
		return 	Redirect::route('list-categories')
				->with('message', 'Category Successfully Updated');
	}

}